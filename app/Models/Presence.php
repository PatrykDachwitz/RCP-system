<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presence extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'user_id',
       'month',
       'year',
       'time_to_work',
       'time_completed',
       'time_worked',
       'time_on_sick_leave',
       'time_on_vacation',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'month' => 'integer',
        'year' => 'integer',
        'time_to_work' => 'integer',
        'time_completed' => 'integer',
        'time_worked' => 'integer',
        'time_on_sick_leave' => 'integer',
        'time_on_vacation' => 'integer',
    ];
}
