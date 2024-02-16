<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
      'day',
      'month',
      'year',
      'day_week',
      'legislative_holiday',
    ];

    protected $casts = [
        'day' => 'integer',
        'month' => 'integer',
        'year' => 'integer',
        'day_week' => 'string',
        'legislative_holiday' => 'boolean',
    ];
}
