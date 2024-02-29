<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use HasFactory,SoftDeletes;

    const NAME_ROUTE_SHOW = 'days.show';
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
        'day_week' => 'integer',
        'legislative_holiday' => 'boolean',
        'redirect' => 'string',
    ];

    protected $appends = [
        'redirect'
    ];


    function getRedirectAttribute(){
        return route(self::NAME_ROUTE_SHOW, [
            'day' => $this->id
        ]);
    }
}
