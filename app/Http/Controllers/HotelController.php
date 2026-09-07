<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        return Hotel::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
            'price_per_night' => 'required|numeric',
            'currency' => 'required|string|max:10',
            'photo_url' => 'nullable|string',
        ]);

        $hotel = Hotel::create($validated);

        return response()->json($hotel, 201);
    }

    public function show(Hotel $hotel)
    {
        return $hotel;
    }

    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
            'price_per_night' => 'sometimes|required|numeric',
            'currency' => 'sometimes|required|string|max:10',
            'photo_url' => 'nullable|string',
        ]);

        $hotel->update($validated);

        return response()->json($hotel);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->json(null, 204);
    }
}