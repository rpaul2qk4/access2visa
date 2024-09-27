<?php
namespace App\Models;

use App\AppModel;

class Country extends AppModel
{   
	protected $table = 'countries';
	
    protected $fillable = [
       'country',
       'code',
       'currency',
       'currency_icon',
    ];	
	
	public function rules()
	{
		$id = $this->id;
		return [
			'country' => "required|unique:countries,country,{$id},id,deleted_at,NULL|max:190",
		];
	}	
	
	public function visa_types()
    {
        return $this->hasMany(VisaType::class);
    }	
	public function dump_files()
    {
        return $this->hasMany(DumpFile::class);
    }	

}
