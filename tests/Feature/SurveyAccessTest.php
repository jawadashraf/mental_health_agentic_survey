<?php

namespace Tests\Feature;

use App\Filament\Pages\ManageMailSettings;
use App\Filament\Pages\ManagePrompts;
use App\Filament\Resources\Organizations\OrganizationResource;
use App\Filament\Resources\Questions\QuestionResource;
use App\Filament\Resources\SurveySessions\Pages\ListSurveySessions;
use App\Filament\Resources\SurveySessions\SurveySessionResource;
use App\Filament\Resources\Users\UserResource;
use App\Filament\Widgets\StatsOverview;
use App\Models\Intent;
use App\Models\Organization;
use App\Models\Survey;
use App\Models\SurveySession;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SurveyAccessTest extends TestCase
{
    use RefreshDatabase;

    protected Organization $raft;

    protected SurveySession $raftSession;

    protected SurveySession $otherSession;

    protected function setUp(): void
    {
        parent::setUp();

        $this->raft = Organization::factory()->create();
        $this->raftSession = SurveySession::factory()
            ->for(Survey::factory()->for($this->raft))
            ->create();
        $this->otherSession = SurveySession::factory()->create();
    }

    public function test_organization_user_only_sees_their_organizations_sessions(): void
    {
        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        Livewire::test(ListSurveySessions::class)
            ->assertCanSeeTableRecords([$this->raftSession])
            ->assertCanNotSeeTableRecords([$this->otherSession]);
    }

    public function test_super_admin_sees_all_sessions_including_unlinked_ones(): void
    {
        $unlinkedSession = SurveySession::factory()->create(['survey_id' => null, 'survey_type' => null]);

        $this->actingAs(User::factory()->superAdmin()->create());

        Livewire::test(ListSurveySessions::class)
            ->assertCanSeeTableRecords([$this->raftSession, $this->otherSession, $unlinkedSession]);
    }

    public function test_organization_user_does_not_see_unlinked_sessions(): void
    {
        $unlinkedSession = SurveySession::factory()->create(['survey_id' => null, 'survey_type' => null]);

        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        Livewire::test(ListSurveySessions::class)
            ->assertCanNotSeeTableRecords([$unlinkedSession]);
    }

    public function test_organization_user_can_open_own_session_but_not_another_organizations(): void
    {
        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        $this->get(SurveySessionResource::getUrl('edit', ['record' => $this->raftSession]))->assertOk();
        $this->get(SurveySessionResource::getUrl('edit', ['record' => $this->otherSession]))->assertNotFound();
    }

    public function test_user_without_organization_cannot_access_panel(): void
    {
        $this->actingAs(User::factory()->create(['organization_id' => null]));

        $this->get('/admin')->assertForbidden();
    }

    public function test_organization_user_can_access_dashboard(): void
    {
        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        $this->get('/admin')->assertOk();
    }

    public function test_dashboard_stats_only_count_visible_sessions(): void
    {
        SurveySession::factory()->count(4)->create();
        Intent::query()->create(['session_id' => $this->raftSession->session_id, 'question_id' => 1, 'question' => 'Q', 'intent' => 'digression']);
        Intent::query()->create(['session_id' => $this->otherSession->session_id, 'question_id' => 1, 'question' => 'Q', 'intent' => 'digression']);

        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        $stats = collect((fn (): array => $this->getStats())->call(new StatsOverview))
            ->mapWithKeys(fn (Stat $stat): array => [$stat->getLabel() => $stat->getValue()]);

        $this->assertSame('1', $stats['Total Sessions']);
        $this->assertSame('1', $stats['Digressions']);
    }

    public function test_organization_users_cannot_reach_super_admin_screens(): void
    {
        $this->actingAs(User::factory()->organizationAdmin($this->raft)->create());

        $this->get(QuestionResource::getUrl('index'))->assertForbidden();
        $this->get(OrganizationResource::getUrl('index'))->assertForbidden();
        $this->get(ManageMailSettings::getUrl())->assertForbidden();
        $this->get(ManagePrompts::getUrl())->assertForbidden();
    }

    public function test_organization_member_cannot_manage_users(): void
    {
        $this->actingAs(User::factory()->organizationMember($this->raft)->create());

        $this->get(UserResource::getUrl('index'))->assertForbidden();
    }

    public function test_super_admin_can_reach_admin_screens(): void
    {
        $this->actingAs(User::factory()->superAdmin()->create());

        $this->get(QuestionResource::getUrl('index'))->assertOk();
        $this->get(OrganizationResource::getUrl('index'))->assertOk();
        $this->get(ManageMailSettings::getUrl())->assertOk();
    }
}
