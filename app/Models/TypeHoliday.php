<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeHoliday extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'active',
    ];

    protected $casts =[
        "name" => 'string',
        "name_holiday" => 'string',
        "active" => 'boolean',
    ];

    protected $appends = [
      'name_holiday'
    ];

    public function getNameHolidayAttribute() {
        if (in_array($this->name, array_keys(__("holidays")))) {
            return __("holidays." . $this->name);
        } else {
            return __('holidays.empty');
        }
    }
}
