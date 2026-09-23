<?php

namespace Tests\Feature;

use App\Filament\Resources\FlaggedResponses\FlaggedResponseResource;
use App\Filament\Resources\FlaggedResponses\Pages\ListFlaggedResponses;
use App\Filament\Resources\SurveySessions\Pages\EditSurveySession;
use App\Filament\Resources\SurveySessions\RelationManagers\ResponsesRelationManager;
use App\Models\Organization;
use App\Models\Survey;
use App\Models\SurveyResponse;
use App\Models\SurveySession;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class FlagReviewTest extends TestCase
{
    use RefreshDatabase;

    protected Organization $raft;

    protected SurveySession $raftSession;

    protected SurveyResponse $raftFlag;

    protected SurveyResponse $otherFlag;

    protected function setUp(): void
    {
        parent::setUp();

        $this->raft = Organization::factory()->create();
        $this->raftSession = SurveySession::factory()->for(Survey::factory()->for($this->raft))->create();
        $this->raftFlag = SurveyResponse::factory()->forSession($this->raftSession)->flagged()->create();
        $this->otherFlag = SurveyResponse::factory()->flagged()->create();
    }

    public function test_organization_user_only_sees_their_own_flags(): void
    {
        $cleanResponse = SurveyResponse::factory()->forSession($this->raftSession)->create();

        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        Livewire::test(ListFlaggedResponses::class)
            ->assertCanSeeTableRecords([$this->raftFlag])
            ->assertCanNotSeeTableRecords([$this->otherFlag, $cleanResponse]);
    }

    public function test_navigation_badge_counts_only_visible_unreviewed_flags(): void
    {
        SurveyResponse::factory()->forSession($this->raftSession)->flagged()->create(['reviewed_at' => now()]);

        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        $this->assertSame('1', FlaggedResponseResource::getNavigationBadge());
    }

    public function test_organization_user_can_mark_flag_reviewed(): void
    {
        $member = User::factory()->organizationMember($this->raft)->create();
        $this->actingAs($member);

        Livewire::test(ListFlaggedResponses::class)
            ->callAction(TestAction::make('markReviewed')->table($this->raftFlag), [
                'review_notes' => 'Called the family and referred to the safeguarding lead.',
            ])
            ->assertHasNoFormErrors()
            ->assertNotified();

        $this->raftFlag->refresh();
        $this->assertSame($member->id, $this->raftFlag->reviewed_by);
        $this->assertNotNull($this->raftFlag->reviewed_at);
        $this->assertSame('Called the family and referred to the safeguarding lead.', $this->raftFlag->review_notes);
    }

    public function test_review_action_is_hidden_once_reviewed(): void
    {
        $this->raftFlag->update(['reviewed_at' => now()]);

        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        Livewire::test(ListFlaggedResponses::class)
            ->assertActionHidden(TestAction::make('markReviewed')->table($this->raftFlag));
    }

    public function test_flag_can_be_reviewed_from_the_session_responses_tab(): void
    {
        $member = User::factory()->organizationMember($this->raft)->create();
        $this->actingAs($member);

        Livewire::test(ResponsesRelationManager::class, [
            'ownerRecord' => $this->raftSession,
            'pageClass' => EditSurveySession::class,
        ])
            ->callAction(TestAction::make('markReviewed')->table($this->raftFlag), ['review_notes' => null])
            ->assertHasNoFormErrors();

        $this->assertSame($member->id, $this->raftFlag->refresh()->reviewed_by);
    }

    public function test_users_cannot_review_other_organizations_flags(): void
    {
        $member = User::factory()->organizationMember($this->raft)->create();

        $this->assertTrue($member->can('review', $this->raftFlag));
        $this->assertFalse($member->can('review', $this->otherFlag));
        $this->assertTrue(User::factory()->superAdmin()->create()->can('review', $this->otherFlag));
    }
}
