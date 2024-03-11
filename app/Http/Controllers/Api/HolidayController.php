<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Holiday\CreateRequest;
use App\Http\Requests\Holiday\UpdateRequest;
use App\Repository\HolidayRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use function Laravel\Prompts\select;

class HolidayController extends Controller
{
    const FILLABLE_INPUTS = [
        'name',
        'active',
        'time_minutes',
    ];
    private $holiday;

    public function __construct(HolidayRepository $holiday)
    {
        $this->holiday = $holiday;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->holiday
        ->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->holiday->create($request->only(self::FILLABLE_INPUTS)), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->holiday
            ->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->holiday->update($id, $request->only(self::FILLABLE_INPUTS)), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->holiday->delete($id), 100);
    }
}
