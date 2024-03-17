<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\CreateRequest;
use App\Http\Requests\Department\UpdateRequest;
use App\Repository\DepartmentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    const FILLABLE_INPUTS = [
      'active',
      'name',
    ];
    private $department;
    public function __construct(DepartmentRepository $department)
    {
        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->department
            ->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->department
            ->create($request->only(self::FILLABLE_INPUTS)), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->department
            ->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return $this->department
            ->update($id,
            $request
                ->only(self::FILLABLE_INPUTS)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->department
        ->delete($id), 100);
    }
}
