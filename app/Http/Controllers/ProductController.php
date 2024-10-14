<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductList()
    {
        try {
            // Fetch all categories
            $ProductData = Product::all();
            return response()->json(['status' => 'success', 'ProductData' => $ProductData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    public function ProductCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Validate the input (Optional)
            // $request->validate([
            //     'category_name' => 'required|string|max:255',
            //     'status' => 'required|string'
            // ]);


            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/Product-img/{$img_name}";
            $img->move(public_path('uploads/Product-img'), $img_name);


            // Create the category
            Product::create([
                'img_url' => $img_url,
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'sell_price' => $request->input('sell_price'),
                'date' => $request->input('date'),
                'status' => $request->input('status'),
                'code' => $request->input('code'),
                'brand_id' => $request->input('brand_id'),
                'category_id' => $request->input('category_id'),
                'unit_id' => $request->input('unit_id'),
                'suppliers_id' => $request->input('suppliers_id'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Product Created Successfully"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function ProductByID(Request $request){
        try {
            $user_id = Auth::id();
            $request->validate(["id" => 'required|string']);

            $rows = Product ::where('id', $request->input('id'))->first();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    public function ProductUpdate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Find the supplier record to update
            $ProductData_Update = Product::find($request->input('id'));

            // Update the supplier's fields
            $ProductData_Update->name = $request->input('name');
            $ProductData_Update->price = $request->input('price');
            $ProductData_Update->sell_price = $request->input('sell_price');
            $ProductData_Update->date = $request->input('date');
            $ProductData_Update->status = $request->input('status');
            $ProductData_Update->code = $request->input('code');
            $ProductData_Update->brand_id = $request->input('brand_id');
            $ProductData_Update->category_id = $request->input('category_id');
            $ProductData_Update->unit_id = $request->input('unit_id');
            $ProductData_Update->suppliers_id = $request->input('suppliers_id');

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $t = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$t}-{$file_name}";
                $img_url = "uploads/Product-img/{$img_name}";

                // Upload File
                $img->move(public_path('uploads/Product-img'), $img_name);


                if ($ProductData_Update->img_url && file_exists(public_path($ProductData_Update->img_url))) {
                    unlink(public_path($ProductData_Update->img_url));
                }
                $ProductData_Update->img_url = $img_url;
            }



            // Save the updated Product data
            $ProductData_Update->save();

            // Return success response
            return response()->json(['status' => 'success', 'message' => 'Product updated successfully']);
        } catch (Exception $e) {
            // Log the error for debugging purposes
            Log::error('Product Update Error: ' . $e->getMessage());

            // Return failure response
            return response()->json(['status' => 'fail', 'message' => 'An error occurred while updating the Product.']);
        }
    }




function ProductDelete(Request $request)
{
    try {
        $request->validate([
            'id' => 'required|string|min:1'
        ]);

        $Product_ID = $request->input('id');
        $ProductData_Delete = Product::find($Product_ID);

        if (!$ProductData_Delete) {
            return response()->json(['status' => 'fail', 'message' => 'Product not found.']);
        }


        if ($ProductData_Delete->img_url && file_exists(public_path($ProductData_Delete->img_url))) {
            unlink(public_path($ProductData_Delete->img_url));
        }

        Product::where('id', $Product_ID)->delete();

        return response()->json(['status' => 'success', 'message' => 'Product Delete Successful']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}




}
