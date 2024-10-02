<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
use App\Models\Company;
use App\Models\Image;


class MemberController extends Controller
{
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.member', $data);
    }


    public function edit($id)
    {
        $company = Company::find($id);
        $cashes = Cash::where('id', $id)->get();
        $images = Image::where('companies_id', $id)->get();
        if (!$images->count()) {
            return redirect()->route('companies.detail')->with('success', 'Images not found');
        }

        return view('detail.detail', compact(['company', 'cashes', 'images']));
    }
}
