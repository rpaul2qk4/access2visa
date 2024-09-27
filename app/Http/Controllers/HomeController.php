<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisaType;
use App\Models\Country;
use \stdClass;

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
    public function userIndex(Request $request)
    {
	
		$country_id=$request->country_id;
		$visa_type_id=$request->visa_type_id;
		if(!empty($country_id) && !empty($visa_type_id))
			$visa_type=VisaType::where('country_id',$country_id)->where('id',$visa_type_id)->get()->first();
		else
			$visa_type=(array)(new stdClass());
		
		
		//var_dump(!empty($visa_type));die();
        return view('user-home',compact(['visa_type','country_id','visa_type_id']));
    }
	
	public function index()
    {
		
        return view('home');
    }
}
