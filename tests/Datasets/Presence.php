<?php
declare(strict_types=1);

dataset('failedInputsRequestPresence', [
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "user_id",
    ]),
    json_encode([
        'value' => 0,
        'name' => "user_id",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "month",
    ]),
    json_encode([
        'value' => 0,
        'name' => "month",
    ]),
    json_encode([
        'value' => 13,
        'name' => "month",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "year",
    ]),
    json_encode([
        'value' => 0,
        'name' => "year",
    ]),
    json_encode([
        'value' => 1999,
        'name' => "year",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "time_to_work",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "time_completed",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "time_worked",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "time_on_sick_leave",
    ]),
    json_encode([
        'value' => "Lorem ipsum",
        'name' => "time_on_vacation",
    ]),
]);
