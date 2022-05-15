<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Auth;

class RoleUser extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_user';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    static function getAllStaff(){

        $staff = new Collection();

        try{
            $staff = DB::table('role_user')
            ->join('users','role_user.user_id','=','users.id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->where('roles.id' ,'=', 1)
            ->orWhere('roles.id' ,'=', 2)
            ->select(['users.id as id',DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),'roles.name as role','users.email as email'])->get();
        }
        catch(Exception $error){
            Log::error("Error trying to staff from Users and role_user table" . $error->getMessage());
        }
        
        return $staff;

    }

    static function getRoleByUserId(){

        try{
            $userRole = DB::table('role_user')
            ->join('users','role_user.user_id','=','users.id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->where('user_id','=',Auth::user()->id)
            ->select(['roles.name'])->get();
        }
        catch(Exception $error){
            Log::error($error->getMessage());
        }

        return $userRole;
    }
}

