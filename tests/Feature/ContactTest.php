<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contacts_screen_can_be_rendered(): void
    {
        $response = $this->get('/contacts');

        $response->assertStatus(200);
    }

    public function test_new_contact_can_created(): void
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/contacts', [
            'name' => 'Jose Antonio',
            'email' => 'junior@teste.com',
            'contact' => '123456789',
        ]);

        $response->assertRedirect('/contacts');
    }

    public function test_get_storage_contact(): void
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/contacts/1');
        $this->assertCount(1, $response);
    }

}
