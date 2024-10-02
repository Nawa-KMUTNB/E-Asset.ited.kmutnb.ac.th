<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{
    public function index()
    {
        $data['user'] = User::orderBy('id', 'asc')->paginate(10);
        return view('user.index', $data);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id), // Ignore current user's email when checking uniqueness
            ],
            'password' => ['required', 'string', 'min:8'],
            // 'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'num_position' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'task' => ['required', 'string', 'max:255'],
            'other_department' => ['nullable', 'string', 'max:255'],
        ]);

        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'other_department' => 'required_if:department,other',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // $user->other_department = $request->input('other_department') === 'other' ? $request['other_department'] : 'other';

        $user->name = $request->name;
        $user->email = $request->email;
        $user->num_position = $request->num_position;
        $user->position = $request->position;
        $user->department = $request->department;
        $user->task = $request->task;
        // $user->other_department = $request->other_department; // Assign other_department if provided
        $user->other_department = $request->input('other_department') === 'other' ? $request['other_department'] : 'other';
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'ลบผู้ใช้งานสำเร็จแล้ว');
    }
}
