<?php

it('returns a successfully entered to dashboard', function () {
    $response = $this->get('/dashboard');

    $response->assertStatus(200);
});
