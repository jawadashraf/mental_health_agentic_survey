<?php

namespace Tests\Feature;

use App\Filament\Resources\Surveys\Pages\EditSurvey;
use App\Filament\Resources\Surveys\Pages\ListSurveys;
use App\Filament\Resources\Surveys\SurveyResource;
use App\Models\Organization;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SurveyResourceTest extends TestCase
{
    use RefreshDatabase;

    protected Organization $raft;

    protected Survey $raftSurvey;

    protected function setUp(): void
    {
        parent::setUp();

        $this->raft = Organization::factory()->create();
        $this->raftSurvey = Survey::factory()->for($this->raft)->create();
    }

    public function test_organization_users_only_see_their_own_surveys(): void
    {
        $otherSurvey = Survey::factory()->create();

        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        Livewire::test(ListSurveys::class)
            ->assertCanSeeTableRecords([$this->raftSurvey])
            ->assertCanNotSeeTableRecords([$otherSurvey]);
    }

    public function test_organization_admin_can_edit_their_surveys_alert_emails(): void
    {
        $this->actingAs(User::factory()->organizationAdmin($this->raft)->create());

        Livewire::test(EditSurvey::class, ['record' => $this->raftSurvey->getRouteKey()])
            ->fillForm([
                'safeguarding_emails' => ['safeguarding@raft.test', 'lead@raft.test'],
                'info_emails' => ['info@raft.test'],
            ])
            ->call('save')
            ->assertHasNoFormErrors()
            ->assertNotified();

        $this->raftSurvey->refresh();
        $this->assertSame(['safeguarding@raft.test', 'lead@raft.test'], $this->raftSurvey->safeguarding_emails);
        $this->assertSame(['info@raft.test'], $this->raftSurvey->info_emails);
        $this->assertSame($this->raft->id, $this->raftSurvey->organization_id);
    }

    public function test_alert_emails_must_be_valid(): void
    {
        $this->actingAs(User::factory()->organizationAdmin($this->raft)->create());

        Livewire::test(EditSurvey::class, ['record' => $this->raftSurvey->getRouteKey()])
            ->fillForm(['safeguarding_emails' => ['not-an-email']])
            ->call('save')
            ->assertHasFormErrors(['safeguarding_emails.0']);
    }

    public function test_organization_admin_cannot_change_survey_ownership_or_name(): void
    {
        $originalName = $this->raftSurvey->name;
        $otherOrganization = Organization::factory()->create();

        $this->actingAs(User::factory()->organizationAdmin($this->raft)->create());

        Livewire::test(EditSurvey::class, ['record' => $this->raftSurvey->getRouteKey()])
            ->fillForm([
                'name' => 'Renamed',
                'organization_id' => $otherOrganization->id,
            ])
            ->call('save');

        $this->raftSurvey->refresh();
        $this->assertSame($originalName, $this->raftSurvey->name);
        $this->assertSame($this->raft->id, $this->raftSurvey->organization_id);
    }

    public function test_organization_member_cannot_edit_surveys(): void
    {
        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        $this->get(SurveyResource::getUrl('edit', ['record' => $this->raftSurvey]))->assertForbidden();
    }

    public function test_organization_admin_cannot_edit_another_organizations_survey(): void
    {
        $otherSurvey = Survey::factory()->create();

        $this->actingAs(User::factory()->organizationAdmin($this->raft)->create());

        $this->get(SurveyResource::getUrl('edit', ['record' => $otherSurvey]))->assertNotFound();
        $this->get(SurveyResource::getUrl('create'))->assertForbidden();
    }
}
