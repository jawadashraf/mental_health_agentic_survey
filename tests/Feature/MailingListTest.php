<?php

namespace Tests\Feature;

use App\Filament\Resources\MailingListSubscribers\Pages\ManageMailingListSubscribers;
use App\Livewire\RaftChat;
use App\Models\MailingListSubscriber;
use App\Models\Organization;
use App\Models\Survey;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Prism\Prism\Facades\Prism;
use Tests\TestCase;

class MailingListTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Prism::fake();
    }

    public function test_participant_can_join_the_mailing_list_after_completing_the_survey(): void
    {
        $chat = $this->completedChat();

        $chat->set('mailingListEmail', ' Parent@Example.com ')
            ->call('joinMailingList')
            ->assertHasNoErrors()
            ->assertSet('joinedMailingList', true)
            ->assertSee("You're on the mailing list.", escape: false);

        $this->assertDatabaseHas('mailing_list_subscribers', [
            'organization_id' => Survey::query()->where('slug', 'raft-test')->value('organization_id'),
            'email' => 'parent@example.com',
        ]);
    }

    public function test_sign_up_is_not_linked_to_the_survey_session(): void
    {
        $this->completedChat()
            ->set('mailingListEmail', 'parent@example.com')
            ->call('joinMailingList');

        $subscriber = MailingListSubscriber::query()->firstOrFail();

        $this->assertSame(['id', 'organization_id', 'email', 'created_at', 'updated_at'], array_keys($subscriber->getAttributes()));
    }

    public function test_joining_twice_does_not_create_duplicates(): void
    {
        $organizationId = Survey::query()->where('slug', 'raft-test')->value('organization_id');
        MailingListSubscriber::factory()->create(['organization_id' => $organizationId, 'email' => 'parent@example.com']);

        $this->completedChat()
            ->set('mailingListEmail', 'parent@example.com')
            ->call('joinMailingList')
            ->assertSet('joinedMailingList', true);

        $this->assertSame(1, MailingListSubscriber::query()->count());
    }

    public function test_invalid_email_is_rejected(): void
    {
        $this->completedChat()
            ->set('mailingListEmail', 'not-an-email')
            ->call('joinMailingList')
            ->assertHasErrors(['mailingListEmail' => 'email'])
            ->assertSet('joinedMailingList', false);

        $this->assertSame(0, MailingListSubscriber::query()->count());
    }

    public function test_mailing_list_is_only_offered_once_the_survey_is_complete(): void
    {
        Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class)
            ->assertDontSee("Want to hear about Raft's events and support?", escape: false)
            ->set('mailingListEmail', 'parent@example.com')
            ->call('joinMailingList');

        $this->assertSame(0, MailingListSubscriber::query()->count());
    }

    public function test_organization_users_only_see_their_own_subscribers(): void
    {
        $raft = Organization::factory()->create();
        $ownSubscriber = MailingListSubscriber::factory()->for($raft)->create();
        $otherSubscriber = MailingListSubscriber::factory()->create();

        $this->actingAs(User::factory()->organizationMember($raft)->create());

        Livewire::test(ManageMailingListSubscribers::class)
            ->assertCanSeeTableRecords([$ownSubscriber])
            ->assertCanNotSeeTableRecords([$otherSubscriber]);
    }

    public function test_organization_admin_can_remove_a_subscriber_but_members_cannot(): void
    {
        $raft = Organization::factory()->create();
        $subscriber = MailingListSubscriber::factory()->for($raft)->create();

        $this->actingAs(User::factory()->organizationMember($raft)->create());

        Livewire::test(ManageMailingListSubscribers::class)
            ->assertActionHidden(TestAction::make(DeleteAction::class)->table($subscriber));

        $this->actingAs(User::factory()->organizationAdmin($raft)->create());

        Livewire::test(ManageMailingListSubscribers::class)
            ->callAction(TestAction::make(DeleteAction::class)->table($subscriber));

        $this->assertModelMissing($subscriber);
    }

    public function test_super_admin_sees_every_organizations_subscribers(): void
    {
        $subscribers = MailingListSubscriber::factory()->count(2)->create();

        $this->actingAs(User::factory()->superAdmin()->create());

        Livewire::test(ManageMailingListSubscribers::class)
            ->assertCanSeeTableRecords($subscribers);
    }

    /**
     * A test-mode chat that has been started and then ended.
     */
    protected function completedChat(): mixed
    {
        return Livewire::withQueryParams(['mode' => 'test'])
            ->withoutLazyLoading()
            ->test(RaftChat::class)
            ->call('askQuestion')
            ->call('endSurvey')
            ->assertSet('surveyCompleted', true)
            ->assertSee("Want to hear about Raft's events and support?", escape: false);
    }
}
