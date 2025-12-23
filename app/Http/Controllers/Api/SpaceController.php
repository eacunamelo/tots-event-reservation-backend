<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Space\StoreSpaceRequest;
use App\Http\Requests\Space\UpdateSpaceRequest;
use App\Models\Space;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
        $this->middleware('admin')->only(['store', 'update', 'destroy']);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            Space::all()
        );
    }

    public function show(int $id): JsonResponse
    {
        $space = Space::findOrFail($id);

        return response()->json($space);
    }

    public function store(StoreSpaceRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('spaces', 'public');
            $data['image_url'] = asset('storage/' . $path);
        }

        $space = Space::create($data);

        return response()->json($space, 201);
    }

    public function update(UpdateSpaceRequest $request, int $id): JsonResponse
    {
        $space = Space::findOrFail($id);
        $data  = $request->validated();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('spaces', 'public');
            $data['image_url'] = asset('storage/' . $path);
        }

        $space->update($data);

        return response()->json($space);
    }

    public function destroy(int $id): JsonResponse
    {
        Space::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
