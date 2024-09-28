<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function savecity(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);

        $city = City::create([
            'name' => $request->input('name'),
            'country_id' => $request->input('country_id'),
        ]);

        return response()->json([
            'message' => 'City added successfully!',
            'city' => $city
        ], 201);
    }
}
