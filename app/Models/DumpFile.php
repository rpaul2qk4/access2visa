<?php
namespace App\Models;

use App\AppModel;


class DumpFile extends AppModel
{
	protected $table = 'dump_files';
	
    protected $fillable = [
        'title',
        'vfile',       
        'visa_type_id', 
		'country_id',		
    ];
	
	public function visa_type()
    {
        return $this->belongsTo(VisaType::class);
    }
	public function country()
    {
        return $this->belongsTo(Country::class);
    }
	
}
