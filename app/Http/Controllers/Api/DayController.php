<?php
declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\DayRepository;
use Illuminate\Http\Request;

class DayController extends Controller
{
    const FILLABLE_PARAMS = [

    ];
    private DayRepository $day;
    public function __construct(DayRepository $day)
    {
        $this->day = $day;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->day
        ->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response($this->day
            ->create($request->only(self::FILLABLE_PARAMS)), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return response($this->day
        ->findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        return response($this->day
        ->update($id, $request->only(self::FILLABLE_PARAMS)), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return response($this->day
            ->delete($id), 200);
    }
}
