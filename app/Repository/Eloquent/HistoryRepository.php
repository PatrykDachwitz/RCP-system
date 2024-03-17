<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;

class HistoryRepository extends AbstractDefaultActions implements \App\Repository\HistoryRepository
{
    public function __construct(History $model)
    {
        $this->model = $model;
    }
}
