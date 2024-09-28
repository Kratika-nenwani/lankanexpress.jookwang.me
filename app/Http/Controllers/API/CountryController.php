<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function savecountry(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $country = Country::create([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Country added successfully!',
            'country' => $country
        ], 201);
    }
}
