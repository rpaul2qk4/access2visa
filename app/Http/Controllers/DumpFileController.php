<?php

namespace App\Http\Controllers;

use App\Models\DumpFile;
use App\Models\VisaType;
use Illuminate\Http\Request;

class DumpFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
		$visa_type=VisaType::findOrFail($id);
        $dump_files=dumpFile::where('visa_type_id',$visa_type->id)->get();
        return view('visa-infos.index',compact(['dump_files','visa_type']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
		$visa_type=VisaType::findOrFail($id);
        return view('visa-infos.create',compact(['visa_type']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $visa_typeId=$request->visa_type_id;
	  
		$visa_type = VisaType::findOrFail($visa_typeId);
	
		try{
			
				$dump_file = new DumpFile();
			
				$dump_file->fill($request->all());
				
				if ($request->file('vfile')) {
					
					$fileType = $_FILES['vfile']['type'];
			
					$fileActualExt = explode('/',$fileType);
					
					$allowed = array('pdf');

					if(!in_array($fileActualExt[1],$allowed)){
						return redirect()->back()->with('error','Please upload the file, pdf types only!!'); 
					} 
					
					$dump_file->vfile = $request->file('vfile')->store('visa_docs','public');					
							
				} 	
			
				$dump_file->country_id=$visa_type->country_id;			
				$dump_file->save();			
					
		} catch (\Exception $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){
					return redirect(route('visa-infos.create',['id'=>$visa_type->id]))->with(['error' => 'Record is already exists!!']);
				}
		}
		
		
		return redirect(route('visa-infos.index',['id'=>$visa_type->id]))->with(['success' => '1 Record inserted successfully!!']);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dump_file=DumpFile::findOrFail($id);
		return view('visa-infos.show',compact(['dump_file']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dump_file=DumpFile::findOrFail($id);
		return view('visa-infos.edit',compact(['dump_file']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //$this->authorize('update', User::class);
		
		$dump_file=DumpFile::findOrFail($id);
    
	//p($request->file('vfile'));
		if ($request->file('vfile')) {
			
		
			
			if(!empty($dump_file->vfile)){
			
				$path=explode('/',$dump_file->vfile);
				
				//p($path[1]);
				
				if(file_exists($path[0])){
					
					unlink($path[0]);
					
				}
			}
			
			$dump_file->fill($request->all());	
			
			$fileType = $_FILES['vfile']['type'];
	
			$fileActualExt = explode('/',$fileType);
			
			$allowed = array('pdf');

			if(!in_array($fileActualExt[1],$allowed)){
				return redirect()->back()->with('error','Please upload the file, pdf types only!'); 
			} 
			  
			$dump_file->vfile = $request->file('vfile')->store('visa_docs','public');		
		
		}else{
			$dump_file->fill($request->all());	
		}
		$dump_file->save();
		
        return redirect(route('visa-infos.index',['id'=>$dump_file->visa_type_id]))->with(['success'=>'1 Record updated successfully!']);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //VisaType::findOrFail($id)->delete();
		$dump_file=DumpFile::findOrFail($id);
		$visa_typeId=$dump_file->visa_type_id;
		$dump_file->forceDelete();
		return redirect(route('visa-infos.index',['id'=>$visa_typeId]))->with('success','1 Record deleted successfully!');

    }
}
