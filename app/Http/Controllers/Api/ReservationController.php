<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): JsonResponse
    {
        return response()->json(
            auth()->user()->reservations()->with('space')->get()
        );
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'space_id'   => 'required|exists:spaces,id',
            'event_name' => 'required|string',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
        ]);

        $reservation = Reservation::create([
            'user_id'    => auth()->id(),
            'space_id'   => $data['space_id'],
            'event_name' => $data['event_name'],
            'start_time' => Carbon::parse($data['start_time'])->format('Y-m-d H:i:s'),
            'end_time'   => Carbon::parse($data['end_time'])->format('Y-m-d H:i:s'),
        ]);

        return response()->json($reservation, 201);
    }

    public function destroy(Reservation $reservation): JsonResponse
    {
        abort_unless($reservation->user_id === auth()->id(), 403);

        $reservation->delete();

        return response()->json(null, 204);
    }
}
