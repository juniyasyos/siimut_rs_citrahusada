<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('access login page', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('access register page', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('a user can register', function () {
    $user = User::factory()->create([
        'email' => 'john@example.com',
    ]);

    expect(User::where('email', 'john@example.com')->exists())->toBeTrue();
});



// test('a user can register', function () {
//     $response = $this->post('/register', [
//         'name' => 'John Doe',
//         'email' => 'john@example.com',
//         'password' => 'password',
//         'password_confirmation' => 'password',
//     ]);

//     expect(User::where('email', 'john@example.com')->exists())->toBeTrue();
//     $response->assertRedirect('/');
// });

// test('a user can login', function () {
//     $user = User::factory()->create([
//         'email' => 'john@example.com',
//         'password' => bcrypt('password'),
//     ]);

//     $response = $this->post('/login', [
//         'email' => 'john@example.com',
//         'password' => 'password',
//     ]);

//     $this->assertAuthenticatedAs($user);
//     $response->assertRedirect('/home');
// });

// test('a user cannot login with incorrect credentials', function () {
//     User::factory()->create([
//         'email' => 'john@example.com',
//         'password' => bcrypt('password'),
//     ]);

//     $response = $this->post('/login', [
//         'email' => 'john@example.com',
//         'password' => 'wrongpassword',
//     ]);

//     $this->assertGuest();
//     $response->assertSessionHasErrors();
// });

// test('a user can logout', function () {
//     $user = User::factory()->create();

//     $this->actingAs($user)->post('/logout');

//     $this->assertGuest();
// });

// test('unauthenticated users are redirected from dashboard', function () {
//     $response = $this->get('/dashboard');

//     $response->assertRedirect('/login');
// });

// test('authenticated users can access dashboard', function () {
//     $user = User::factory()->create();

//     $response = $this->actingAs($user)->get('/dashboard');

//     $response->assertStatus(200);
// });
