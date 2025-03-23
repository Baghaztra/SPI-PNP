<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $pengguna = User::when($query, function ($q) use ($query) {
            return $q->where("name", "like", "%" . $query . "%");
        })->latest()->paginate(10);

        return view("siwas.users.index")->with(['pengguna' => $pengguna,'q'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siwas.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            // 'role' => 'required|in:admin,user',
            // 'status' => 'required|boolean',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['status'] = 1;

        User::create($validated);

        return redirect()->route('siwas.users.index')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('siwas.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:8|confirmed',
            // 'role' => 'required|in:admin,user',
            'status' => 'required|boolean',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('siwas.users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('siwas.users.index')->with('danger', 'User deleted successfully');
    }

    /**
     * Toggle the user status.
     */
    public function updateStatus($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => $user->status == 1 ? 0 : 1]);

        return redirect()->route('siwas.users.index')->with('success', 'User status updated successfully');
    }
}
