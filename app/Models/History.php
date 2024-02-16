<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'day_id',
        'user_id',
        'work_minutes',
        'start_work',
        'end_work',
    ];

    protected $casts = [
        'day_id' => 'integer',
        'user_id' => 'integer',
        'work_minutes' => 'integer',
        'start_work' => 'datetime:d-m-Y H:i:s',
        'end_work' => 'datetime:d-m-Y H:i:s',
    ];
}
