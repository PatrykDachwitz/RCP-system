<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class DepartmentRepository extends AbstractDefaultActions implements \App\Repository\DepartmentRepository
{

    public function __construct(Department $model)
    {
        $this->model = $model;
    }
}
