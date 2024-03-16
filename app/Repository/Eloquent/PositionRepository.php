<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use App\Models\Position;
use Illuminate\Database\Eloquent\Model;

class PositionRepository extends AbstractDefaultActions implements \App\Repository\PositionRepository
{

    public function __construct(Position $model)
    {
        parent::__construct($model);
    }
}
