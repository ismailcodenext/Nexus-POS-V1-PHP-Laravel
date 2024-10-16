<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{


    public function WarehouseList()
{
    try {
        // Fetch all WarehouseData
        $WarehouseData = Warehouse::all();
        return response()->json(['status' => 'success', 'WarehouseData' => $WarehouseData]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}



public function WarehouseCreate(Request $request)
{
    try {
        $user_id = Auth::id();

        // Create the WarehouseData
        Warehouse::create([
            'warehouse_name' => $request->input('warehouse_name'),
            'number' => $request->input('number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
            'user_id' => $user_id
        ]);
        return response()->json(['status' => 'success', 'message' => "Warehouse Created Successfully"]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}





function WarehouseByID(Request $request){
    try {
        $user_id = Auth::id();
        $request->validate(["id" => 'required|string']);

        $rows = Warehouse ::where('id', $request->input('id'))->first();
        return response()->json(['status' => 'success', 'rows' => $rows]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

//



function WarehouseUpdate(Request $request)
{
try {
    $user_id = Auth::id();
    $WarehouseData_Update = Warehouse::find($request->input('id'));

    if (!$WarehouseData_Update) {
        return response()->json(['status' => 'fail', 'message' => 'Warehouse not found.']);
    }

    // Update Warehouse name and status
    $WarehouseData_Update->warehouse_name = $request->input('warehouse_name');
    $WarehouseData_Update->number = $request->input('number');
    $WarehouseData_Update->email = $request->input('email');
    $WarehouseData_Update->address = $request->input('address');
    $WarehouseData_Update->status = $request->input('status');


    $WarehouseData_Update->save();

    return response()->json(['status' => 'success', 'message' => 'Warehouse updated successfully']);
} catch (Exception $e) {
    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
}
}



function WarehouseDelete(Request $request)
{
try {
    // Validation
    $request->validate(['id' => 'required|string|min:1']);

    $Warehouse_id = $request->input('id');
    $Warehouse_delete = Warehouse::find($Warehouse_id);

    if (!$Warehouse_delete) {
        return response()->json(['status' => 'fail', 'message' => 'Warehouse not found.']);
    }


    // Delete Warehouse
    $Warehouse_delete->delete();

    return response()->json(['status' => 'success', 'message' => 'Warehouse deleted successfully']);
} catch (Exception $e) {
    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
}
}






}
