<?php

namespace Tests\Feature;

use App\Filament\Pages\ManageChatAccess;
use App\Models\Organization;
use App\Models\User;
use App\Settings\ChatSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ManageChatAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_access_chat_settings_page(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();

        $this->actingAs($superAdmin)
            ->get(ManageChatAccess::getUrl())
            ->assertOk();
    }

    public function test_organization_admin_can_access_chat_settings_page(): void
    {
        $org = Organization::factory()->create();
        $admin = User::factory()->organizationAdmin($org)->create();

        $this->actingAs($admin)
            ->get(ManageChatAccess::getUrl())
            ->assertOk();
    }

    public function test_organization_member_cannot_access_chat_settings_page(): void
    {
        $org = Organization::factory()->create();
        $member = User::factory()->organizationMember($org)->create();

        $this->actingAs($member)
            ->get(ManageChatAccess::getUrl())
            ->assertForbidden();
    }

    public function test_admin_can_update_chat_access_settings(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();
        $this->actingAs($superAdmin);

        Livewire::test(ManageChatAccess::class)
            ->fillForm([
                'access_code' => 'custom-pass-777',
                'privacy_notice' => 'Custom privacy reminder for users.',
                'disclaimer_title' => 'Updated Disclaimer Title',
                'disclaimer_content' => 'Updated disclaimer content text.',
                'require_disclaimer' => true,
            ])
            ->call('save')
            ->assertHasNoFormErrors()
            ->assertNotified();

        $settings = app(ChatSettings::class);
        $this->assertSame('custom-pass-777', $settings->access_code);
        $this->assertSame('Custom privacy reminder for users.', $settings->privacy_notice);
        $this->assertSame('Updated Disclaimer Title', $settings->disclaimer_title);
        $this->assertSame('Updated disclaimer content text.', $settings->disclaimer_content);
        $this->assertTrue($settings->require_disclaimer);
    }

    public function test_admin_can_generate_random_secret_via_action(): void
    {
        $superAdmin = User::factory()->superAdmin()->create();
        $this->actingAs($superAdmin);

        $initialCode = app(ChatSettings::class)->access_code;

        Livewire::test(ManageChatAccess::class)
            ->callAction('generateRandomSecret')
            ->assertNotified();

        $settings = app(ChatSettings::class);
        $this->assertNotSame($initialCode, $settings->access_code);
        $this->assertNotEmpty($settings->access_code);
    }
}
