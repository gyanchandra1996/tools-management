<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\ToolIssue;
use Illuminate\Support\Facades\Auth;

class MechanicController extends Controller
{
    public function dashboard()
    {
        $availableTools = Tool::where('quantity', '>', 0)
            ->latest()
            ->get();

        $myIssues = ToolIssue::with('tool')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'mechanic.dashboard',
            compact(
                'availableTools',
                'myIssues'
            )
        );
    }
}