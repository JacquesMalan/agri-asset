<?php

use App\Models\User;

it('allows visitors to sign in as the demo guest', function () {
    $guestUser = User::factory()->assetManager()->create([
        'email' => config('demo.guest_email'),
    ]);

    $response = $this->post(route('demo.login'));

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($guestUser);
});
