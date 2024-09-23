<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Supriler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuprilerController extends Controller
{
    public function SuprilerCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Handling image upload if exists
            if ($request->hasFile('img_url')) {
                $img_path = $request->file('img_url')->store('uploads/supriler-images', 'public');
            }

            // Creating the supplier entry
            Supriler::create([
                'name' => $request->input('name'),
                'company' => $request->input('company'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'img_url' => $img_path ?? null,  // Store image path if available
                'status' => $request->input('status'),
                'user_id' => $user_id,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Supplier Created Successfully']);
        }catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function SuprilerList()
{
    try {
        // Fetch all categories
        $SuprilerData = Supriler::all();
        return response()->json(['status' => 'success', 'SuprilerData' => $SuprilerData]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

}
