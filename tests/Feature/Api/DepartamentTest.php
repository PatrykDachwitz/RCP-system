<?php

it('has api\departaments page', function () {
    $response = $this->get('/api\departaments');

    $response->assertStatus(200);
});
