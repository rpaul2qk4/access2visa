<?php
namespace App\Helpers;

use App\Models\Role;
use App\Models\Country;
use App\Models\VisaType;

class DataHelper
{
	public static function getDisciplines() {
		return Discipline::all();
	}
	public static function getVisaTypesOptions($country_id) {
		if($country_id)
		return Country::findOrFail($country_id)->visa_types->pluck('visa_type','id')->prepend('Select','')->toArray();
	}
	
	public static function getRoles() {
		return Role::where('role','<>','Admin')->get()->pluck('role','id')->prepend('Select role','')->toArray();
	}
	public static function getExptAdminRoles() {
		return Role::where('role','<>','Admin')->get()->pluck('role','id')->prepend('Select role','')->toArray();
	}
	
	public static function getCountriesOptions() {
		return Country::get()->pluck('country','id')->prepend('Select country','')->toArray();
	}
	public static function CountriyCurrency($countyId) {
		$currencyIcon=Country::get()->pluck('currency_icon','id')->toArray();
		return $currencyIcon[$countyId];
	}
	
	public static function getCountriesNames() {
		return Country::get()->pluck('country');
	}
	public static function getStatesNames() {
		return State::get()->pluck('state');
	}
		
	public static function config($key) {
		//var_dump($key);die();
		$config = Config::where('key', $key)->first();
		if ($config) {
			return $config->value;
		}
	}
	
	public static function getSeason($month) {
		$seasons = [
			'Spring' => [3, 4, 5],
			'Summer' => [6, 7, 8],
			'Autumn' => [9, 10, 11],
			'Winter' => [12, 1, 2],
		];

		foreach ($seasons as $season => $months) {
			if (in_array($month, $months)) {
				return $season;
			}
		}

		return 'Invalid month';
	}
	
	public static function getPassword() {
		return 'abcd1234';//self::uniqid_base36();
    }
	
	public static function monthOptions() {
		return [
			'1' => 'January',
			'2' => 'Febuary',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		];
	}
	
	public static function getDataAccessFormat() {
		return [
			'asc' => 'Ascending',
			'desc' => 'Descending',			
		];
	}
	
	public static function colorCodes (){
		
		return [	
			0=>'rgb(255, 255, 255)',
			1=>'rgb(192, 192, 192)',
			2=>'rgb(128, 128, 128)',
			3=>'rgb(0, 0, 0)',
			4=>'rgb(255, 0, 0)',
			
			5=>'rgb(232,244,234)',
			6=>'rgb(255, 255, 0)',
			7=>'rgb(128, 128, 0)',
			8=>'rgb(128, 0, 128)',
			9=>'rgb(0, 128, 0)',
			
			10=>'rgb(0, 255, 255)',
			11=>'rgb(0, 128, 128)',
			12=>'rgb(0, 0, 255)',
			13=>'rgb(0, 0, 128)',
			14=>'rgb(255, 0, 255)',
			
			15=>'rgb(128, 0, 128)',
			16=>'rgb(165,42,42)',
			17=>'rgb(255,192,203)'		
		];
	}
}
