<?php

namespace Tests\Unit\Controllers\Api\V1;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson(route('users.index'));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]);
    }

    public function test_store_user()
    {
        $userData = User::factory()->raw();
    
        $response = $this->postJson(route('users.registers'), $userData);
    
        $token = $response->json()['token']; // Extract token from JSON response
    
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'User Created',
                'token' => $token // Include token in assertion
            ]);
    }
    


    public function test_show_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->getJson(route('users.show', $user->id));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]);
    }

    public function test_update_user()
    {
        $user = User::factory()->create();
        $updatedData = ['name' => 'Updated Name'];
        $this->actingAs($user);

        $response = $this->putJson(route('users.update', $user->id), $updatedData);

        $response->assertStatus(200)
            ->assertJson($updatedData);

        $this->assertDatabaseHas('users', $updatedData);
    }

    public function test_destroy_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->deleteJson(route('users.destroy', $user->id));

        $response->assertStatus(200);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
