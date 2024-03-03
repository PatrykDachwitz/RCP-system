<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractDefaultActions implements DefaultActionsInterfaces
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get(int $padding = 20)
    {
        return $this->model
            ->paginate($padding);
    }

    public function create(array $data)
    {
        return $this->model
            ->create($data);
    }

    public function update(int $id, array $data)
    {
        $model = $this->findOrFail($id);

        $model->update($data);
        $model->save();

        return $model;
    }

    public function delete(int $id)
    {
        return $this->model
            ->destroy($id);
    }

    public function findOrFail(int $id)
    {
        return $this->model
            ->findOrFail($id);
    }
}
