<?php

namespace App\Http\Controllers;

use App\Models\VisaType;
use App\Models\Country;
use App\Models\DumpFile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visa_types = VisaType::orderBy('visa_type', 'asc')->paginate(50);
		return view('visa-types.index', compact(['visa_types'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
		return view('visa-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
		try{
			$visa_type = new VisaType;
			$visa_type->fill($request->all());
			$visa_type->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('visa-types.index'))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('visa-types.index'))->with(['success' => '1 Record inserted successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $visa_type = VisaType::findOrFail($id);
		return view('visa-types.show', compact(['visa_type']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visa_type = VisaType::findOrFail($id);
		return view('visa-types.edit', compact(['visa_type']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $visa_type = VisaType::findOrFail($id);		
		try{			
			$visa_type->fill($request->all());
			$visa_type->save();
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('visa-types.index'))->with(['error' => 'Record is already exists!!']);
				}
		}
		return redirect(route('visa-types.index'))->with(['success'=>'VisaType updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //VisaType::findOrFail($id)->delete();
		 VisaType::findOrFail($id)->forceDelete();
		return redirect(route('visa-types.index'))->with('success','1 Record deleted successfully!');
    }
	
	public function getVisaType($id)
    {		
		$country=Country::findOrFail($id);
		$visa_types=$country->visa_types->pluck('visa_type','id');                             
        return response()->json($visa_types->toArray());
    }
	
	public function getVisaInfo($id)
    {		
		$dump_file=DumpFile::findOrFail($id);
	    return response()->json($dump_file->toArray());
    }
}
