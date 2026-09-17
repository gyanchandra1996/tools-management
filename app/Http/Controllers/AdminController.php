<?php

namespace App\Http\Controllers;

use App\Models\Tool;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalTools = Tool::count();

        $totalQuantity = Tool::sum('quantity');

        return view(
            'admin.dashboard',
            compact(
                'totalTools',
                'totalQuantity'
            )
        );
    }
}