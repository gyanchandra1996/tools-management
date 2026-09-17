<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
     $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'image' => 'nullable|max:2048',
            'password' => 'required|string|min:6',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $user->image = basename($imagePath);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');



    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

   public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:191',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'image' => 'nullable|image|max:2048',
        'password' => 'nullable|string|min:6',
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    if ($request->hasFile('image')) {

        // Delete old image
        if (
            $user->image &&
            Storage::disk('public')->exists('images/' . $user->image)
        ) {
            Storage::disk('public')->delete('images/' . $user->image);
        }

        // Upload new image
        $imageName = time() . '_' .
            $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs(
            'images',
            $imageName,
            'public'
        );

        // Save filename in database
        $user->image = $imageName;
    }

    $user->save();

    return redirect()
        ->route('users.index')
        ->with('success', 'User updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
