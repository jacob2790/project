<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Validator;
class Pets extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'status','category_id','tag_id'];

    public static $rules = [
        'name' => 'required',              
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


    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }


    public function tags()
    {
        return $this->belongsTo('App\Tags', 'tag_id');
    }



    public function pets()
    {
        return $this->hasMany('App\PetImages', 'pet_id');
    }    
}
