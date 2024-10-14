<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Supriler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SuprilerController extends Controller
{


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


    public function SuprilerCreate(Request $request)
    {
        try {
                    $user_id = Auth::id();
            $img = $request->file('img_url');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/supriler-images/{$img_name}";

            // Upload File
            $img->move(public_path('uploads/supriler-images'), $img_name);

            // Creating the supplier entry
            Supriler::create([
                'name' => $request->input('name'),
                'company' => $request->input('company'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'img_url' => $img_url,
                'status' => $request->input('status'),
                'user_id' => $user_id,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Supplier Created Successfully']);
        }catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




function SuprilerByID(Request $request){
    try {
        $user_id = Auth::id();
        $request->validate(["id" => 'required|string']);

        $rows = Supriler ::where('id', $request->input('id'))->first();
        return response()->json(['status' => 'success', 'rows' => $rows]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


public function SuprilerUpdate(Request $request)
{
    try {
        $user_id = Auth::id();
        // Find the supplier record to update
        $SuprilerData_Update = Supriler::find($request->input('id'));

        // Update the supplier's fields
        $SuprilerData_Update->name = $request->input('name');
        $SuprilerData_Update->company = $request->input('company');
        $SuprilerData_Update->mobile = $request->input('mobile');
        $SuprilerData_Update->address = $request->input('address');
        $SuprilerData_Update->email = $request->input('email');
        $SuprilerData_Update->status = $request->input('status');

        // Handle the image file if it exists
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/supriler-images/{$img_name}";

            // Move the file to the desired directory
            if ($img->move(public_path('uploads/supriler-images/'), $img_name)) {
                // Delete the old image if it exists
                if ($SuprilerData_Update->img_url && file_exists(public_path($SuprilerData_Update->img_url))) {
                    unlink(public_path($SuprilerData_Update->img_url));
                }
                // Update the img_url field in the database
                $SuprilerData_Update->img_url = $img_url;
            }
        }

        // Save the updated supplier data
        $SuprilerData_Update->save();

        // Return success response
        return response()->json(['status' => 'success', 'message' => 'Supplier updated successfully']);
    } catch (Exception $e) {
        // Log the error for debugging purposes
        Log::error('Supplier Update Error: ' . $e->getMessage());

        // Return failure response
        return response()->json(['status' => 'fail', 'message' => 'An error occurred while updating the supplier.']);
    }
}




function SuprilerDelete(Request $request)
{
    try {
        $request->validate([
            'id' => 'required|string|min:1'
        ]);

        $Supriler_ID = $request->input('id');
        $SuprilerData_Delete = Supriler::find($Supriler_ID);

        if (!$SuprilerData_Delete) {
            return response()->json(['status' => 'fail', 'message' => 'Supriler not found.']);
        }

        if ($SuprilerData_Delete->img_url && file_exists(public_path($SuprilerData_Delete->img_url))) {
            unlink(public_path($SuprilerData_Delete->img_url));
        }

        Supriler::where('id', $Supriler_ID)->delete();

        return response()->json(['status' => 'success', 'message' => 'Supriler Delete Successful']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}






}
