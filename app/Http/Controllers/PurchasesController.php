<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Purchases;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function PurchasesList()
    {
        try {
            // Fetch all categories
            $PurchasesData = Purchases::all();
            return response()->json(['status' => 'success', 'PurchasesData' => $PurchasesData]);
        } catch (Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
