<?php

it('has apinotactiveuser page', function () {
    $response = $this->get('/apinotactiveuser');

    $response->assertStatus(200);
});
