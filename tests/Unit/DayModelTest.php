<?php

test('Has a primary atributes', function () {
    $day = new \App\Models\Day([
       'month' => 12,
       'year' => 2014,
       'day_week' => "saturday",
       'legislative_holiday' => 0,
       'day' => 12,
    ]);
    expect($day->month)->toBe(12);
    expect($day->year)->toBe(2014);
    expect($day->day_week)->toBe("saturday");
    expect($day->legislative_holiday)->toBeFalse();
    expect($day->day)->toBe(12);
});
