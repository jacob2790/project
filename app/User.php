<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Validator;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [        
        'username',
        'firstName',
        'lastName',
        'email',
        'password',
        'phone',
        'userStatus'
    ];
    public static $rules = [
        'username' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'phone' => 'required',    
        'email' => 'required|email',
       //phone' => 'required|numeric'
    ];
    public static $profile_rules = [
        'email' => 'required|email',
        'username' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'phone' => 'required',   
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
    
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

   
}
