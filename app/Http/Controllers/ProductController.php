<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
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

            // Create the category
            Product::create([
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
        Product::where('id', $Product_ID)->delete();

        return response()->json(['status' => 'success', 'message' => 'Product Delete Successful']);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}




}
