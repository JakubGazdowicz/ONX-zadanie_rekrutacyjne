<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessUsersToCustomerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
    }

    public function test_user_can_see_customers(): void
    {
        $response = $this->actingAs($this->user)->get('/api/v1/customers');

        $response->assertStatus(200);
    }

    public function test_user_can_update_customer()
    {
        Customer::factory()->create();
        $response = $this->actingAs($this->user)->put('/api/v1/customers/1');

        $response->assertStatus(403);
    }

    private function createUser(): User
    {
        return User::factory()->create();
    }
}
