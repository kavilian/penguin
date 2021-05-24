<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_user_can_login_using_the_login_form() {
        
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'//the strting 'password' is the default password created by factory()
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');

    }

    public function test_user_can_not_access_admin_page() {
        
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'//the strting 'password' is the default password created by factory()
        ]);

        $this->get('/admin/users');
        $response->assertRedirect('/');

    }

    public function test_user_can_access_admin_page() {
        
        $user = User::factory()->create();
        $user->roles()->attach(1);//1 is for admin role
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password'//the strting 'password' is the default password created by factory()
        ]);

        $response = $this->get('/admin/users');
        $response->assertSeeText('Users');

    }


}
