<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = User::where('role', 'staff')->get();
        // return view('livewire.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'staff',
            'status'   => 'aktif'
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil ditambahkan');
    }

    public function edit(User $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, User $staff)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $staff->id,
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $staff->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'status' => $request->status, // <-- pastikan ini ada!
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil diperbarui');
    }

    public function destroy(User $staff)
    {
        $staff->update(['status' => 'nonaktif']);

        return redirect()->route('staff.index')->with('success', 'Staff dinonaktifkan');
    }
}
