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




function CategoryByID(Request $request){
    try {
        $user_id = Auth::id();
        $request->validate(["id" => 'required|string']);

        $rows = Category ::where('id', $request->input('id'))->first();
        return response()->json(['status' => 'success', 'rows' => $rows]);
    } catch (Exception $e) {
        return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    }
}

//



function CategoryUpdate(Request $request)
{
try {
    $user_id = Auth::id();
    $CategoryData_Update = Category::find($request->input('id'));

    if (!$CategoryData_Update) {
        return response()->json(['status' => 'fail', 'message' => 'Category not found.']);
    }

    // Validate inputs
    $validatedData = $request->validate([
        'category_name' => 'required|string|max:255',
        'status' => 'required|in:Active,InActive',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024', // Max 1MB
    ]);

    // Update Category name and status
    $CategoryData_Update->category_name = $validatedData['category_name'];
    $CategoryData_Update->status = $validatedData['status'];

    $CategoryData_Update->save();

    return response()->json(['status' => 'success', 'message' => 'Category updated successfully']);
} catch (Exception $e) {
    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
}
}



function CategoryDelete(Request $request)
{
try {
    // Validation
    $request->validate(['id' => 'required|string|min:1']);

    $Category_id = $request->input('id');
    $Category_delete = Category::find($Category_id);

    if (!$Category_delete) {
        return response()->json(['status' => 'fail', 'message' => 'Category not found.']);
    }


    // Delete Category
    $Category_delete->delete();

    return response()->json(['status' => 'success', 'message' => 'Category deleted successfully']);
} catch (Exception $e) {
    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
}
}







}
