<?php
declare(strict_types=1);

dataset('getRoutes', [
    fn() => route('days.index'),
    fn() => route('departments.index'),
    fn() => route('histories.index'),
    fn() => route('holidays.index'),
    fn() => route('typeHolidays.index'),
    fn() => route('days.show', [
        'day' => 1
    ]),
    fn() => route('departments.show', [
        'department' => 1
    ]),
    fn() => route('histories.show', [
        'history' => 1
    ]),
    fn() => route('holidays.show', [
        'holiday' => 1
    ]),
]);

dataset('putRoutes', [
    fn() => route('days.update', [
        'day' => 1
    ]),
    fn() => route('departments.update', [
        'department' => 1
    ]),
    fn() => route('histories.update', [
        'history' => 1
    ]),
    fn() => route('holidays.update', [
        'holiday' => 1
    ]),
]);

dataset('postRoutes', [
    fn() => route('days.store'),
    fn() => route('departments.store'),
    fn() => route('histories.store'),
    fn() => route('holidays.store'),
]);

dataset('deleteRoutes', [
    fn() => route('days.destroy', [
        'day' => 1
    ]),
    fn() => route('departments.destroy', [
        'department' => 1
    ]),
    fn() => route('histories.destroy', [
        'history' => 1
    ]),
    fn() => route('holidays.destroy', [
        'holiday' => 1
    ]),
]);
