<?php
declare(strict_types=1);

dataset('day', [
    fn() => array(['id' => 65,
        'day' => 1,
        'month' => 12,
        'year' => 2024,
        'day_week' => 2,
        'legislative_holiday' => false]),
]);


dataset('failedInputsRequest', [
    json_encode([
        'value' => "testData",
        'name' => "day",
    ]),
    json_encode([
        'value' => 0,
        'name' => "day",
    ]),
    json_encode([
        'value' => 32,
        'name' => "day",
    ]),
    json_encode([
        'value' => 13,
        'name' => "month",
    ]),
    json_encode([
        'value' => 0,
        'name' => "month",
    ]),
    json_encode([
        'value' => "testData",
        'name' => "month",
    ]),
    json_encode([
        'value' => "testData",
        'name' => "year",
    ]),
    json_encode([
        'value' => "testData",
        'name' => "day_week",
    ]),
    json_encode([
        'value' => 0,
        'name' => "day_week",
    ]),
    json_encode([
        'value' => 8,
        'name' => "day_week",
    ]),
    json_encode([
        'value' => "testData",
        'name' => "legislative_holiday",
    ]),
]);
