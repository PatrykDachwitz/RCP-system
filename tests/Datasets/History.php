<?php
declare(strict_types=1);

dataset('failedInputsRequestHistory', [
    json_encode([
        'value' => "test",
        'name' => "day_id",
    ]),
    json_encode([
        'value' => 0,
        'name' => "day_id",
    ]),
    json_encode([
        'value' => 0,
        'name' => "user_id",
    ]),
    json_encode([
        'value' => "test",
        'name' => "user_id",
    ]),
    json_encode([
        'value' => "test",
        'name' => "work_minutes",
    ]),
    json_encode([
        'value' => "0",
        'name' => "start_work",
    ]),
    json_encode([
        'value' => "test",
        'name' => "end_work",
    ]),
]);
