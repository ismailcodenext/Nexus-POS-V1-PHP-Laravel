<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{

    public function BrandCreate(Request $request)
    {
        try {
            $user_id = Auth::id();
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/brand_img/{$img_name}";

            // Upload File
            $img->move(public_path('uploads/brand_img'), $img_name);

            // Ensure the correct fields are being retrieved
            Brand::create([
                'name' => $request->input('brand_name'),
                'status' => $request->input('status'),
                'logo' => $img_url,
                'user_id' => $user_id
            ]);

            return response()->json(['status' => 'success', 'message' => "Brand Created Successfully"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    public function BrandList()
    {
        try {
            $user_id = Auth::id();
            $BrandData = Brand::get();
            return response()->json(['status' => 'success', 'BrandData' => $BrandData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
