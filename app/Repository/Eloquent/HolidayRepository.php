<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use App\Models\Holiday;
use Illuminate\Database\Eloquent\Model;

class HolidayRepository extends AbstractDefaultActions implements \App\Repository\HolidayRepository
{
    public function __construct(Holiday $model)
    {
        parent::__construct($model);
    }
}
