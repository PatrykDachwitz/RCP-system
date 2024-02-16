<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'notification',
        'day_id',
    ];


    protected $casts = [
        'user_id' => "integer",
        'notification' => 'string',
        'day_id' => 'integer',
    ];
}
