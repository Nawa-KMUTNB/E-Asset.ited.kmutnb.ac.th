<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bring;
use Illuminate\Support\Facades\Validator;

class BringController extends Controller
{
    public function index()
    {
        $data['brings'] = Bring::orderBy('id', 'asc')->paginate(10);
        return view('bring.index', $data);
    }

    public function member()
    {
        $data['brings'] = Bring::orderBy('id', 'asc')->paginate(10);
        return view('bring.member', $data);
    }

    public function create()
    {
        $brings = Bring::all();
        return view('bring.create', compact('brings'));
    }

    public function store(Request $request)
    {

        // Validate การเบิกครุภัณฑ์
        $request->validate([
            'FullName' => 'required|string|max:255',
            'date_bring' => 'required|date',
            'detail' => 'required|string|max:255',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'name_asset' =>   'required|string|max:255',
            'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})?$/',
            'num_sent' => 'required|string|max:255',
            'Date_into' => 'required|date',
            //'department' => 'required_if:select_field,selected_value',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',
            'place' => 'required|string|max:255',
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


        $brings = new Bring;
        $brings->FullName = $request->input('FullName');
        $brings->date_bring = $request->input('date_bring');
        $brings->detail = $request->input('detail');
        $brings->num_asset = $request->input('num_asset');
        $brings->name_asset = $request->input('name_asset');
        $brings->per_price = $request->input('per_price');
        $brings->num_sent = $request->input('num_sent');
        $brings->Date_into = $request->input('Date_into');

        $brings->department = $request->input('department');
        $brings->other_department = $request->input('other_department') ?: '';


        $brings->num_department = $request->input('num_department');
        $brings->place = $request->input('place');

        $brings->save();

        return redirect()->route('bring.index')->with('success', 'เพิ่มการเบิกครุภัณฑ์สำเร็จแล้ว');
    }


    public function edit($id)
    {
        $brings = Bring::find($id);
        return view('bring.edit', compact('brings'));
    }

    public function update(Request $request, $id)
    {

        // Validate การเบิกครุภัณฑ์
        $request->validate([
            'FullName' => 'required|string|max:255',
            'date_bring' => 'required|date',
            'detail' => 'required|string|max:255',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'name_asset' =>   'required|string|max:255',
            'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})?$/',
            'num_sent' => 'required|string|max:255',
            'Date_into' => 'required|date',
            // 'department' => 'required_if:select_field,selected_value',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',
            'place' => 'required|string|max:255',
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


        /*
        $brings = Bring::find($id);
        $brings->update([
            "FullName" => $request->FullName,
            "date_bring" => $request->date_bring,
            "detail" => $request->detail,
            "num_asset" => $request->num_asset,
            "name_asset" => $request->name_asset,
            "per_price" => $request->per_price,
            "num_sent" => $request->num_sent,
            "Date_into" => $request->Date_into,

            "department" => $request->department,


            "num_department" => $request->num_department,
            "place" => $request->place,
        ]);
*/


        $brings = Bring::find($id);
        $brings->FullName = $request->input('FullName');
        $brings->date_bring = $request->input('date_bring');
        $brings->detail = $request->input('detail');
        $brings->num_asset = $request->input('num_asset');
        $brings->name_asset = $request->input('name_asset');
        $brings->per_price = $request->input('per_price');
        $brings->num_sent = $request->input('num_sent');
        $brings->Date_into = $request->input('Date_into');

        $brings->department = $request->department;
        if ($request->department == 'other') {
            $brings->other_department = $request->other_department;
        }


        $brings->num_department = $request->input('num_department');
        $brings->place = $request->input('place');
        $brings->update();

        return redirect()->route('bring.index')->with('edit', 'แก้ไขการเบิกครุภัณฑ์สำเร็จแล้ว');
    }


    public function destroy($id)
    {
        $brings = Bring::find($id);
        $brings->delete();
        return redirect()->route('bring.index')->with('delete', 'ลบการเบิกครุภัณฑ์สำเร็จแล้ว');
    }
}