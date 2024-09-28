<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Thought;

class ThoughtController extends Controller
{
    public function savethought(Request $request)
    {
        
        $request->validate([
            'quote' => 'required',
            'thought' => 'required',

        ]);

        $quote = Thought::create([
            'quote' => $request->input('quote'),
            'thought' => $request->input('thought'),
        ]);

        return response()->json($quote, 200);
        
    }


    public function viewthought()
    {
        $data = Thought::all();
        return response()->json($data, 200);
    }

    public function updatethought(Request $request)
    { 
        
        $request->validate([
            'quote' => 'required',
            'thought' => 'required',

        ]);

        // Find the Thought by its ID
        $thought = Thought::first();


        // Update the Thought with new data
        $thought->quote = $request->input('quote');
        $thought->thought = $request->input('thought');
        $thought->save();

        // Return the updated Thought
        return response()->json($thought, 200);
    }

}
