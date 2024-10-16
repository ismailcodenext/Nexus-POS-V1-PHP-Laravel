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






   // Unit List all Categories
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



function UnitByID(Request $request){
    try {
        $user_id = Auth::id();
        $request->validate(["id" => 'required|string']);

        $rows = Unit ::where('id', $request->input('id'))->first();
        return response()->json(['status' => 'success', 'rows' => $rows]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

//



function UnitUpdate(Request $request)
{
try {
    $user_id = Auth::id();
    $UnitData_Update = Unit::find($request->input('id'));

    if (!$UnitData_Update) {
        return response()->json(['status' => 'fail', 'message' => 'Unit not found.']);
    }

    // Validate inputs
    $validatedData = $request->validate([
        'unit_name' => 'required|string|max:255',
        'status' => 'required|in:Active,InActive',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // Max 1MB
    ]);

    // Update Unit name and status
    $UnitData_Update->unit_name = $validatedData['unit_name'];
    $UnitData_Update->status = $validatedData['status'];

    $UnitData_Update->save();

    return response()->json(['status' => 'success', 'message' => 'Unit updated successfully']);
} catch (Exception $e) {
    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
}
}



function UnitDelete(Request $request)
{
try {
    // Validation
    $request->validate(['id' => 'required|string|min:1']);

    $Unit_id = $request->input('id');
    $Unit_delete = Unit::find($Unit_id);

    if (!$Unit_delete) {
        return response()->json(['status' => 'fail', 'message' => 'Unit not found.']);
    }


    // Delete Unit
    $Unit_delete->delete();

    return response()->json(['status' => 'success', 'message' => 'Unit deleted successfully']);
} catch (Exception $e) {
    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
}
}








}
