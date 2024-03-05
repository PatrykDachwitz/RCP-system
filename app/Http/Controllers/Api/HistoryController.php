<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\History\CreateRequest;
use App\Http\Requests\History\UpdateRequest;
use App\Repository\HistoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HistoryController extends Controller
{
    const FILLABLE_INPUT = [
        'day_id',
        'user_id',
        'work_minutes',
        'start_work',
        'end_work',
    ];
    protected $history;
    public function __construct(HistoryRepository $history)
    {
        $this->history = $history;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->history
        ->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        if (Gate::denies('isThisUser', $request->input('user_id', 0))) abort(403);

        return response($this->history
        ->create(
            $request
                ->only(self::FILLABLE_INPUT)
        ), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $history = $this->history
            ->findOrFail($id);

        if (Gate::denies('isThisUser', $history->user_id)) abort(403);

        return $history;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return $this->history
            ->update($id, $request
            ->only(self::FILLABLE_INPUT));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (Gate::denies('SuperAdminPermissionUser')) abort(403);

        return response($this->history
        ->delete($id), 100);
    }
}
