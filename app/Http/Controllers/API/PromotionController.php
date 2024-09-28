<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    
     public function savepromotion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'type' => 'required',
            // 'caption' => 'required',
            // 'images.*' => 'required|image',  // Validate each file as an image
            // 'video_link' => 'required',
            // 'shorts_link' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move('PromotionImages/', $filename);
                $imagePaths[] = $filename;
            }
        } 

        $promotion = Promotion::create([
            'type' => $request->type,
            'caption' => $request->caption,
            'images' => json_encode($imagePaths),  // Save paths as JSON
            'video_link' => $request->video_link,
            'shorts_link' => $request->shorts_link,
        ]);

        return response()->json($promotion, 200);
    }
    
     public function getpromotion()
    {
        $data = Promotion::all();
        return response()->json($data, 200);
    }
    
   public function deletePromotion(Request $request, $id)
{
    // Find the promotion by ID, or return a 404 error if not found
    $promotion = Promotion::findOrFail($id);

    // Delete the promotion
    $promotion->delete();

    // Return a success response
    return response()->json([
        'message' => 'Promotion deleted successfully!',
    ], 200);
}


}
