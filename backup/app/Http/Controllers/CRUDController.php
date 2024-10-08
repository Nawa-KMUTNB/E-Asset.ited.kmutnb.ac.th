<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cash;
use App\Models\Chips;
use App\Models\Company;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;

class CRUDController extends Controller
{
    //Create Index
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.index', $data);
    }
    public function member()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);

        return view('companies.member', $data);
    }

    //Crate Resource
    public function create()
    {
        return view('companies.create');
    }

    public function edit($id)
    {
        $company = Company::find($id);

        $cash = Chips::find($id);

        $cashes = Cash::groupBy('code_money')
            ->get();
        if (!$cashes->count()) {
            return redirect()->route('companies.edit')->with('success', 'Cash not found');
        }

        $images = Image::where('companies_id', $id)->get();
        if (!$images) {
            return view('companies.detail', ['images' => $images])->with('success', 'ไม่มีรูปภาพเพิ่มเติม');
        }
        return view('companies.edit', compact(['company', 'cash', 'cashes', 'images']));
    }

    public function update(Request $request, $id)
    {
        // Validate ข้อมูลครุภัณฑ์
        $request->validate([
            'cover.*' => 'mimes:jpeg,jpg,png|max:2048',
            'images.*' => 'mimes:jpeg,jpg,png|max:2048',
            'num_asset' => 'required|string|regex:/^\d{12}-\d{5}-\d{5}$/',
            'date_into' => 'required|date',
            'name_asset' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'unit' =>   'required|string|max:60',
            'place' => 'required|string|max:255',
            // 'per_price' =>  'required|numeric|regex:/^[0-9]{1,8}(\.[0-9]{2})$/',
            // 'per_price' => "required|string|regex:$pattern",
            'status_buy' => 'required|string|max:255',
            //'num_old_asset' => 'required|string|regex:/^\d{3}(\-)\d{2}(\-)\d{1}(\-)(\d{1}\/\d{5})$/',
            'num_old_asset' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',

            'name_info' => 'required|string|max:255',
            'num_department' => 'required|string|regex:/^[0-9]{3,5}$/',

        ]);

        $company = Company::find($id);

        if ($request->hasFile("cover")) {
            if (File::exists("cover/" . $company->cover)) {
                File::delete("cover/" . $company->cover);
            }
            $file = $request->file("cover");
            $company->cover = time() . "_" . $file->getClientOriginalName();
            $file->move('../public/cover', $company->cover);
            $request['cover'] = $company->cover;
        }


        //Cash Update (อัพเดทตาราง Cash ของแหล่งเงิน ชื่อแหล่งเงิน งบประจำปี)
        $cash = Chips::find($id);

        $code_money = $request->input('code_money');
        $name_money = $request->input('name_money');
        $budget = $request->input('budget');

        if (!empty($code_money) && !empty($name_money) && !empty($budget)) {
            $cash->code_money = $code_money;
            $cash->name_money = $name_money;
            $cash->budget = $budget;
            $cash->update();
        } else {


            if ($cash['code_money'] !== $cash->code_money) {
                $cash->code_money = $cash['code_money'];
            }
            if ($cash['name_money'] !== $cash->name_money) {
                $cash->name_money = $cash['name_money'];
            }
            if ($cash['budget'] !== $cash->budget) {
                $cash->budget = $cash['budget'];
            }
            $cash->update();
        }

        $validator = Validator::make($request->all(), [
            'department' => 'required',
            'other_department' => 'required_if:department,other',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

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
            if (!empty($other_department)) {
                $company->other_department = $other_department;
            }
        }

        $company->name_info = $request->input('name_info');
        $company->num_department = $request->input('num_department');

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request["companies_id"] = $id;
                $request["image"] = $imageName;
                $file->move('../public/images', $imageName);
                Image::create($request->all());
            }
        }
        $company->update();

        return redirect()->route('companies.index')->with('edit', 'แก้ไขครุภัณฑ์สำเร็จแล้ว');
    }

    public function destroy($id)
    {

        $company = Company::findOrFail($id);
        $destination = 'cover/' . $company->cover;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        $images = Image::where('companies_id', $company->id)->get();
        foreach ($images as $image) {
            if (File::exists("images/" . $image->image)) {
                File::delete("images/" . $image->image);
            }
            $image->delete();
        }

        $cash = Chips::findOrFail($id);

        $company->delete();
        $cash->delete();

        return redirect()->route('companies.index')->with('delete', 'ลบครุภัณฑ์สำเร็จแล้ว');
    }


    function pdf()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_companies_to_html());
        return $pdf->stream();
    }

    function convert_companies_to_html()
    {
        $companies = DB::table('companies')->get();
        $chips = DB::table('chips')->get();
        $users = DB::table('users')->get();
        return view('companies.pdf')->with(['companies' => $companies, 'chips' => $chips, 'users' => $users]);
    }

    public function destroyImg($id)
    {
        $images = Image::findOrFail($id);
        if (File::exists("images/" . $images->image)) {
            File::delete("images/" . $images->image);
        }
        $images->delete();
        return response()->json(['success' => 'Image deleted successfully']);
    }


    public function detailCompany($id)
    {
        $company = Company::find($id);
        $cashes = Chips::where('id', $id)->get();
        $images = Image::where('companies_id', $id)->get();
        if (!$images) {
            return view('companies.detail', ['images' => $images])->with('success', 'ไม่มีรูปภาพเพิ่มเติม');
        }
        return view('companies.detail', compact(['company', 'cashes', 'images']));
    }


    public function detailMember($id)
    {
        $company = Company::find($id);
        $cashes = Chips::where('id', $id)->get();
        $images = Image::where('companies_id', $id)->get();
        if (!$images) {
            return view('companies.detail', ['images' => $images])->with('success', 'ไม่มีรูปภาพเพิ่มเติม');
        }
    }
}
