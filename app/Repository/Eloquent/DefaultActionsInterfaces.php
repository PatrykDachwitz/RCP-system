<?php
declare(strict_types=1);
namespace App\Repository\Eloquent;

interface DefaultActionsInterfaces
{
    public function get(int $padding);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function findOrFail(int $id);
}
