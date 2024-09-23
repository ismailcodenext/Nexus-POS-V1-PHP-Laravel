<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Validate the input (Optional)
            $request->validate([
                'unit_name' => 'required|string|max:255',
                'status' => 'required|string'
            ]);

            // Create the UnitData
            Unit::create([
                'unit_name' => $request->input('unit_name'),
                'status' => $request->input('status'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Unit Created Successfully"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }






   // List all Categories
public function UnitList()
{
    try {
        // Fetch all categories
        $UnitData = Unit::all();
        return response()->json(['status' => 'success', 'UnitData' => $UnitData]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}
}
