<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.member', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        //return view('adminHome');
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(10);
        return view('companies.index', $data);
    }
}
