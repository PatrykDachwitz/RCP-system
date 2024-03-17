<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Presence\CreateRequest;
use App\Http\Requests\Presence\UpdateRequest;
use App\Repository\PresenceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PresenceController extends Controller
{
    const FILLABLE_INPUTS = [
        'user_id',
        'month',
        'year',
        'time_to_work',
        'time_completed',
        'time_worked',
        'time_on_sick_leave',
        'time_on_vacation'
    ];
    private PresenceRepository $presences;
    public function __construct(PresenceRepository $presences)
    {
        $this->presences = $presences;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->presences
            ->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->presences
        ->create(
            $request->only(self::FILLABLE_INPUTS)
        ), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response(
            $this->presences
            ->update($id, $request->only(self::FILLABLE_INPUTS)),
            200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response(
            $this->presences->delete($id),
            100);
    }
}
