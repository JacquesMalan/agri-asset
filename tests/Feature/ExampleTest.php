<?php

test('shows the AgriAsset welcome page', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee(__('welcome.heading'))
        ->assertSee(asset('images/agriasset-farm-hero.png'), false);
});
