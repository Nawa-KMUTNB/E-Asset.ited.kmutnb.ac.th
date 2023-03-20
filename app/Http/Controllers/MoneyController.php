<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Models\Chips;
use App\Models\Company;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MoneyController extends Controller
{
    public function create()
    {
        $monies = Money::all();
        $cashes_list = DB::table('cashes')
            ->groupBy('code_money')
            ->get();

        return view('companies.createdetail', compact('monies'))->with('cashes_list', $cashes_list);
    }


    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('cashes')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">โปรดเลือก ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        $output .= '<option value="other">อื่น ๆ (โปรดระบุ)</option>';
        echo $output;
    }

    public function store(Request $request)
    {


        $request->validate([
            'cover.*' => 'mimes:jpeg,jpg,png|max:2048',
            'images.*' => 'mimes:jpeg,jpg,png|max:2048',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'date_into' => 'required|date',
            'name_asset' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'unit' =>   'required|string|max:60',
            'place' => 'required|string|max:255',
            'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})$/',
            'status_buy' => 'required|string|max:255',
            //'num_old_asset' => 'required|string|regex:/^\d{3}(\-)\d{2}(\-)\d{1}(\-)(\d{1}\/\d{5})$/',
            'num_old_asset' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',

            'name_info' => 'required|string|max:255',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',

            'code_money' => 'required',
            'name_money' => 'required',
            'budget' => 'required',
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


        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move('../public/cover', $imageName);

            $company = new Company;

            //------------------------- เพิ่มข้อมูลตาราง Chips --------------
            $cash = new Chips;

            $cash->code_money = $request->input('code_money');
            if ($request->input('code_money') === 'other') {
                $cash->otherCode = $request->input('otherCode');
                $cash->code_money = 0;
            } else {
                $cash->otherCode = '';
            }

            $cash->name_money = $request->input('name_money');
            if ($request->input('name_money') === 'other') {
                $cash->otherMoney = $request->input('otherMoney');
                $cash->name_money = 0;
            } else {
                $cash->otherMoney = '';
            }

            $cash->budget = $request->input('budget');
            if ($request->input('budget') === 'other') {
                $cash->otherBudget = $request->input('otherBudget');
                $cash->budget = 0;
            } else {
                $cash->otherBudget = '';
            }

            $cash->save();
            //------------------------------------------------------------------------------------------
            $company->num_asset = $request->input('num_asset');
            $company->date_into = $request->input('date_into');
            $company->name_asset = $request->input('name_asset');
            $company->detail = $request->input('detail');
            $company->unit = $request->input('unit');
            $company->place = $request->input('place');
            $company->per_price = $request->input('per_price');
            $company->status_buy = $request->input('status_buy');
            $company->num_old_asset = $request->input('num_old_asset');
            $company->fullname = $request->input('fullname');


            $company->department = $request->input('department');
            if ($request->input('department') === 'other') {
                $company->other_department = $request->input('other_department');
                $company->department = 0;
            } else {
                $company->other_department = '';
            }

            $company->name_info = $request->input('name_info');
            $company->num_department = $request->input('num_department');
            $company->cover = $imageName;


            $company->code_money_id = $cash->id;
            $company->name_money_id = $cash->id;
            $company->budget = $cash->id;
            $company->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['companies_id'] = $company->id;
                $request['image'] = $imageName;
                $file->move('../public/images', $imageName);
                Image::create($request->all());
            }
        }


        return redirect()->route('companies.index')->with('success', 'เพิ่มครุภัณฑ์สำเร็จแล้ว');
    }
}
