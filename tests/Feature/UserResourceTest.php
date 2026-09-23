<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\UserResource;
use App\Models\Organization;
use App\Models\User;
use Filament\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    use RefreshDatabase;

    protected Organization $raft;

    protected User $raftAdmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->raft = Organization::factory()->create();
        $this->raftAdmin = User::factory()->organizationAdmin($this->raft)->create();
    }

    public function test_organization_admin_only_sees_their_organizations_users(): void
    {
        $colleague = User::factory()->organizationMember($this->raft)->create();
        $outsider = User::factory()->organizationMember()->create();
        $superAdmin = User::factory()->superAdmin()->create();

        $this->actingAs($this->raftAdmin);

        Livewire::test(ListUsers::class)
            ->assertCanSeeTableRecords([$this->raftAdmin, $colleague])
            ->assertCanNotSeeTableRecords([$outsider, $superAdmin]);
    }

    public function test_organization_admin_creates_users_in_their_own_organization_and_invites_them(): void
    {
        Notification::fake();
        $otherOrganization = Organization::factory()->create();

        $this->actingAs($this->raftAdmin);

        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'New Raft Staff',
                'email' => 'staff@raft.test',
                'role' => UserRole::OrganizationMember->value,
                'organization_id' => $otherOrganization->id,
                'receives_flag_alerts' => false,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $user = User::query()->where('email', 'staff@raft.test')->sole();
        $this->assertSame($this->raft->id, $user->organization_id);
        $this->assertSame(UserRole::OrganizationMember, $user->role);
        $this->assertFalse($user->receives_flag_alerts);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_organization_admin_cannot_create_super_admins(): void
    {
        $this->actingAs($this->raftAdmin);

        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Sneaky',
                'email' => 'sneaky@raft.test',
                'role' => UserRole::SuperAdmin->value,
            ])
            ->call('create')
            ->assertHasFormErrors(['role']);

        $this->assertDatabaseMissing('users', ['email' => 'sneaky@raft.test']);
    }

    public function test_organization_admin_cannot_edit_other_organizations_users(): void
    {
        $outsider = User::factory()->organizationMember()->create();

        $this->actingAs($this->raftAdmin);

        $this->get(UserResource::getUrl('edit', ['record' => $outsider]))->assertNotFound();
    }

    public function test_super_admin_can_assign_users_to_any_organization(): void
    {
        Notification::fake();

        $this->actingAs(User::factory()->superAdmin()->create());

        Livewire::test(CreateUser::class)
            ->fillForm([
                'name' => 'Raft Lead',
                'email' => 'lead@raft.test',
                'role' => UserRole::OrganizationAdmin->value,
                'organization_id' => $this->raft->id,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('users', [
            'email' => 'lead@raft.test',
            'organization_id' => $this->raft->id,
            'role' => UserRole::OrganizationAdmin->value,
        ]);
    }
}
