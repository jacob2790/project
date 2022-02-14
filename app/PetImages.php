<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Validator;
class PetImages extends Model
{
    protected $table = 'petsimages';
    protected $primaryKey = 'id';
    protected $fillable = ['pet_id', 'image', 'status'];

    public static $rules = [
        'pet_id' => 'required',
        'image' => 'required',        
    ];

    public static function validate_add($data)
    {
        return Validator::make($data, static::$rules);
    }


    public static function validate_update($data, $id)
    {
        $update_rule = static::$rules;
        return Validator::make($data, $update_rule);
    }


    public function pets()
    {
        return $this->belongsTo('App\Pets', 'pet_id');
    }    
}
