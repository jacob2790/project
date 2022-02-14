<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Validator;
class Stores extends Model
{
    protected $table = 'stores';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'petId','quantity','shipDate','status','complete'];


    public static $rules = [
        'petId' => 'required',    
        'quantity' => 'required', 
        'shipDate' => 'required', 
        'status' => 'required', 
        'complete' => 'required',          
    ];

    public static function validate_add($data)
    {
        return Validator::make($data, static::$rules);
    }
       
}
