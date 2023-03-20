<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

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

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'num_position' => ['required', 'string', 'regex:/^[0-9]{3,5}$/'],
            'position' => ['required', 'string', 'max:255'],
            // 'department' => ['required', 'string', 'max:255'],
            'task' => ['required', 'string', 'max:255'],
            'is_admin' => ['required', 'numeric', 'regex:/^[0-1]{1}$/'],
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


        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->num_position = $request->input('num_position');
        $user->position = $request->input('position');

        $user->department = $request->input('department');
        $user->other_department = $request->input('other_department') ?: '';

        $user->task = $request->input('task');
        // $user->password = $request->password;
        $user->is_admin = $request->input('is_admin');
        $user->update();

        return redirect()->route('user.index')->with('success', 'แก้ไขผู้ใช้งานสำเร็จแล้ว');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'ลบผู้ใช้งานสำเร็จแล้ว');
    }
}
