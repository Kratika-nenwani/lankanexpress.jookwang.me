<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DropOfPoint;

class DropOfPointController extends Controller
{
    public function saveDropofpoint(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'number' => 'required',
              'number1' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',


        ]);

        $dropofpoint = Dropofpoint::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'number' => $request->input('number'),
             'number1' => $request->input('number1'),
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),


        ]);

        return response()->json([
            'message' => 'Drop-off point added successfully!',
            'dropofpoint' => $dropofpoint
        ], 201);
    }
    
    
      public function viewdropofpoints()
    {
        $data = DropOfPoint::all();
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
