<?php
namespace App\Models;

use App\AppModel;

class VisaType extends AppModel
{
	protected $table = 'visa_types';
     protected $fillable = [
        'country_id',
        'visa_type',
        'code',       
    ];
	
	public function dump_files()
    {
        return $this->hasMany(DumpFile::class);
    }
	
	public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
