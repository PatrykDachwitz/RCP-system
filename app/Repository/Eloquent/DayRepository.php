<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use App\Models\Day;

class DayRepository extends AbstractDefaultActions implements \App\Repository\DayRepository
{

    public function __construct(Day $model)
    {
        $this->model = $model;
    }

    public function get(int $padding = 40)
    {
        return parent::get($padding);
    }
}
