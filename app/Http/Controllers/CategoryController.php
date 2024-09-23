<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryCreate(Request $request)
    {
        try {
            $user_id = Auth::id();

            // Validate the input (Optional)
            $request->validate([
                'category_name' => 'required|string|max:255',
                'status' => 'required|string'
            ]);

            // Create the category
            Category::create([
                'category_name' => $request->input('category_name'),
                'status' => $request->input('status'),
                'user_id' => $user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Category Created Successfully"]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



   // List all Categories
public function CategoryList()
{
    try {
        // Fetch all categories
        $CategoryData = Category::all();
        return response()->json(['status' => 'success', 'CategoryData' => $CategoryData]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}


}
