<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Position\CreateRequest;
use App\Http\Requests\Position\UpdateRequest;
use App\Repository\PositionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PositionController extends Controller
{
    const FILLABLE_INPUTS = [
      'name',
      'active',
    ];
    private $positions;
    public function __construct(PositionRepository $positions)
    {
        $this->positions = $positions;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->positions
        ->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response(
            $this->positions
                ->create(
                    $request->only(self::FILLABLE_INPUTS)
                ), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->positions
            ->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return $this->positions
            ->update(
                $id,
                $request->only(self::FILLABLE_INPUTS)
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->positions
        ->delete($id), 100);
    }
}
