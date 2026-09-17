<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\ToolIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ToolIssueController extends Controller
{
    public function issue(
        Request $request,
        Tool $tool
    ) {

        $validated = $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:' . $tool->quantity
            ]
        ]);


        if ($tool->quantity < $validated['quantity']) {

            return back()->with(
                'error',
                'Not enough quantity available.'
            );
        }


        DB::transaction(function () use (
            $tool,
            $validated
        ) {

            // Reduce inventory

            $tool->decrement(
                'quantity',
                $validated['quantity']
            );


            // Create issue record

            ToolIssue::create([

                'user_id' => Auth::id(),

                'tool_id' => $tool->id,

                'quantity' => $validated['quantity'],

                'issue_date' => now(),

                'status' => 'issued'

            ]);
        });


        return back()->with(
            'success',
            'Tool issued successfully.'
        );
    }


    public function returnTool(
    ToolIssue $issue
) {

    // Security check:
    // Mechanic can return only his own issue.

    if ($issue->user_id !== Auth::id()) {

        abort(403, 'Unauthorized access.');
    }


    // Already returned

    if ($issue->status === 'returned') {

        return back()->with(
            'error',
            'Tool already returned.'
        );
    }


    DB::transaction(function () use ($issue) {

        // Increase inventory

        $issue->tool->increment(
            'quantity',
            $issue->quantity
        );


        // Update issue record

        $issue->update([

            'return_date' => now(),

            'status' => 'returned'

        ]);
    });


    return back()->with(
        'success',
        'Tool returned successfully.'
    );
}


}