<?php

namespace App\Repository\Eloquent;

use App\Models\TypeHoliday;
use Illuminate\Database\Eloquent\Model;

class TypeHolidayRepository extends AbstractDefaultActions implements \App\Repository\TypeHolidayRepository
{
    public function __construct(TypeHoliday $model)
    {
        parent::__construct($model);
    }

    public function get(int $padding = 30)
    {
        return parent::get($padding);
    }
}
