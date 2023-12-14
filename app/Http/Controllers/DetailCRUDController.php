<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chips;
use App\Models\Company;
use App\Models\Detail_Asset;
use App\Models\Image;
use App\Models\Money;
use Illuminate\Support\Facades\DB;


class DetailCRUDController extends Controller
{
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(1);
        $cashes_list = DB::table('cashes')
            ->groupBy('code_money')
            ->get();

        return view('companies.detail', $data)->with('cashes_list', $cashes_list);
    }

    /*public function edit(Company $company)
    {
        return view('companies.detail', compact('company'));
    }*/

    public function edit($id)
    {
        $company = Company::find($id);
        $cashes = Chips::where('id', $id)->get();
        $images = Image::where('companies_id', $id)->get();
        if (!$images->count()) {
            return redirect()->route('companies.detail')->with('success', 'Images not found');
        }
        return view('companies.detail', compact(['company', 'cashes', 'images']));
    }

    public function create()
    {
        $monies = Money::all();
        return view('companies.createdetail', compact('monies'));
    }

    public function store(Request $request)
    {
        $detail_asset = new Detail_Asset;
        $detail_asset->num_asset = $request->input('num_asset');
        $detail_asset->date_into = $request->input('date_into');
        $detail_asset->name_asset = $request->input('name_asset');
        $detail_asset->detail = $request->input('detail');
        $detail_asset->unit = $request->input('unit');
        $detail_asset->place = $request->input('place');
        $detail_asset->per_price = $request->input('per_price');
        $detail_asset->status_buy = $request->input('status_buy');
        $detail_asset->num_old_asset = $request->input('num_old_asset');

        if ($request->hasFile('pic')) {
            $uploadFile = 'upload/companies/';

            foreach ($request->file('pic') as $picFile) {
                $extention = $picFile->getClientOriginalExtension();
                $fileName = time() . '.' . $extention;
                $picFile->move($uploadFile, $fileName);
                $finalImageFile = $uploadFile . '-' . $fileName;
                $detail_asset->pic->create([
                    'pic' => $finalImageFile,
                ]);
            }


            /*
          $file = $request->file('pic');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move($uploadFile, $fileName);
            $detail_asset->pic = $fileName;
            */
        }
        $detail_asset->save();

        return redirect()->route('companies.index')->with('success', 'เพิ่มครุภัณฑ์สำเร็จแล้ว');
    }
}
