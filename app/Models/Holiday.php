<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use HasFactory, SoftDeletes;

    const NAME_ROUTE_SHOW = 'holidays.show';

    protected $fillable = [
        'active',
        'name',
        'time_minutes',
    ];

    protected $casts = [
        'active' => 'boolean',
        'name' => 'string',
        'time_minutes' => 'integer',
    ];

    protected $appends = [
      'redirect'
    ];

    function getRedirectAttribute(){
        return route(self::NAME_ROUTE_SHOW, [
            'holiday' => $this->id
        ]);
    }


}
