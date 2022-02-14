<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Validator;
class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name'];

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
       
}
