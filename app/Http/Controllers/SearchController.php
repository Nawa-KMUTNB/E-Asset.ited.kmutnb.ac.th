<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $brings = DB::table('brings')
            ->where('FullName', 'LIKE', "%$search_text%")
            ->orWhere('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('num_sent', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('other_department', 'LIKE', "%$search_text%")
            ->paginate(10);

        $users = User::where('name', 'LIKE', "%$search_text%")
            ->orWhere('num_position', 'LIKE', "%$search_text%")
            ->orWhere('position', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('task', 'LIKE', "%$search_text%")
            ->get();

        // return view('bring.index', ['brings' => $brings, 'users' => $users]);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('bring.pdf', ['brings' => $brings, 'users' => $users])->render());
        return $pdf->stream('filename.pdf');
    }

    //ค้นหาหน้าการเบิก member
    function searchMember(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $brings = DB::table('brings')
            ->where('FullName', 'LIKE', "%$search_text%")
            ->orWhere('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('num_sent', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('other_department', 'LIKE', "%$search_text%")
            ->get();

        // return view('bring.member', ['brings' => $brings, 'users' => $users]);

        $pdf = PDF::loadView('bring.pdfMem', ['brings' => $brings]);
        return $pdf->stream();
    }



    function find(Request $request)
    {

        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $companies = DB::table('companies')->where('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('fullname', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_old_asset', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            // ->paginate(10);
            ->get();


        $users = User::where('name', 'LIKE', "%$search_text%")
            ->orWhere('num_position', 'LIKE', "%$search_text%")
            ->orWhere('position', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('task', 'LIKE', "%$search_text%")
            ->get();

        //$company = Company::query($search_text);

        // $pdf = PDF::loadView('companies.findPDF', ['companies' => $companies, 'users' => $users]);
        // return $pdf->stream();


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('companies.findPDF', ['companies' => $companies, 'users' => $users])->render());
        return $pdf->stream('filename.pdf');
        // return view('companies.FindPDF')->with(['companies' => $companies, 'search_text' => $search_text, 'company' => $company]);
    }

    //การค้นหาหน้า Memebr หน้าหลัก
    function finduser(Request $request)
    {
        $request->validate([
            'query' => 'required'
        ]);

        $search_text = $request->input('query');
        $companies = DB::table('companies')->where('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('fullname', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_old_asset', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->paginate(10);

        // $pdf = PDF::loadView('detail.pdf', ['companies' => $companies]);
        // return $pdf->stream();

        return view('companies.member', ['companies' => $companies]);
    }


    /*
    function get_companies()
    {
        $companies = DB::table('companies')
            ->get();
        return $companies;
    }
*/
    function pdf(Request $request)
    {

        /*
        $search_text = $request->input('query');
        $companies = DB::table('companies')
            ->where('num_asset', 'LIKE', "%$search_text%")
            ->orWhere('name_asset', 'LIKE', "%$search_text%")
            ->orWhere('fullname', 'LIKE', "%$search_text%")
            ->orWhere('department', 'LIKE', "%$search_text%")
            ->orWhere('num_old_asset', 'LIKE', "%$search_text%")
            ->orWhere('place', 'LIKE', "%$search_text%")
            ->orWhere('num_department', 'LIKE', "%$search_text%")
            ->get();


        $company = Company::query($search_text);

        $pdf = PDF::loadView('PDF.searchAdmin', ['companies' => $companies, 'search_text' => $search_text, 'company' => $company]);
*/

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_companies_to_html($request));
        return $pdf->stream();
    }
    /*
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->convert_companies_to_html($request));
    return $pdf->stream();
*/

    function convert_companies_to_html(Request $request)
    {
        $search_text = $request->input('query');
        $companies = Company::query($search_text);
        return view('PDF.searchAdmin')->with(['companies' => $companies, 'search_text' => $search_text]);
    }
}
