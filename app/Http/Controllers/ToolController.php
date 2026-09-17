<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Tool List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $tools = Tool::latest()->get();

        return view(
            'admin.tools.index',
            compact('tools')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Add Tool Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.tools.create');
    }


    /*
    |--------------------------------------------------------------------------
    | Store Tool
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'tool_name' => [
                'required',
                'string',
                'max:100'
            ],

            'category' => [
                'required',
                'string',
                'max:100'
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],
        ]);


        $image = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $image = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('tools'), $image);
        }


        Tool::create([

            'tool_name' => $validated['tool_name'],

            'category' => $validated['category'],

            'quantity' => $validated['quantity'],

            'image' => $image,

        ]);


        return redirect()
            ->route('admin.tools.index')
            ->with(
                'success',
                'Tool added successfully.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Tool Form
    |--------------------------------------------------------------------------
    */

    public function edit(Tool $tool)
    {
        return view(
            'admin.tools.edit',
            compact('tool')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Tool
    |--------------------------------------------------------------------------
    */
public function update(
        Request $request,
        Tool $tool
    ) {

        $validated = $request->validate([

            'tool_name' => [
                'required',
                'string',
                'max:100'
            ],

            'category' => [
                'required',
                'string',
                'max:100'
            ],

            'quantity' => [
                'required',
                'integer',
                'min:0'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048'
            ],
        ]);


        $data = [

            'tool_name' => $validated['tool_name'],

            'category' => $validated['category'],

            'quantity' => $validated['quantity'],

        ];


        if ($request->hasFile('image')) {

            if ($tool->image && file_exists(public_path('tools/' . $tool->image))) {

                unlink(public_path('tools/' . $tool->image));
            }


            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('tools'), $filename);

            $data['image'] = $filename;
        }


        $tool->update($data);


        return redirect()
            ->route('admin.tools.index')
            ->with(
                'success',
                'Tool updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Tool
    |--------------------------------------------------------------------------
    */

    public function destroy(Tool $tool)
    {
        if ($tool->image) {

            Storage::disk('public')
                ->delete($tool->image);
        }

        $tool->delete();

        return redirect()
            ->route('admin.tools.index')
            ->with(
                'success',
                'Tool deleted successfully.'
            );
    }
}