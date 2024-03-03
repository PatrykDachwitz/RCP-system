<?php

it('has apinotauthuser page', function () {
    $response = $this->get('/apinotauthuser');

    $response->assertStatus(200);
});
