<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Http\Requests\Reservation\StoreReservationRequest;
use App\Http\Requests\Reservation\UpdateReservationRequest;
use Illuminate\Http\JsonResponse;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse
    {
        return response()->json(
            auth()->user()->reservations()->with('space')->get()
        );
    }

    public function show(int $id): JsonResponse
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return response()->json($reservation);
    }

    public function store(StoreReservationRequest $request): JsonResponse
    {
        $data = $request->validated();

        $overlap = Reservation::where('space_id', $data['space_id'])
            ->where('start_time', '<', $data['end_time'])
            ->where('end_time', '>', $data['start_time'])
            ->exists();

        if ($overlap) {
            return response()->json([
                'message' => 'El espacio ya está reservado en ese horario'
            ], 409);
        }

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            ...$data,
        ]);

        return response()->json($reservation, 201);
    }

    public function update(UpdateReservationRequest $request, int $id): JsonResponse
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $reservation->update($request->validated());

        return response()->json($reservation);
    }

    public function destroy(int $id): JsonResponse
    {
        Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->delete();

        return response()->json(null, 204);
    }
}
