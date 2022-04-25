<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Role extends LaratrustRole
{
    public $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    static function getRoles(){

        $roles = new Collection();

        try{
            $roles = DB::table('roles')
            ->select(['id','name','display_name','description'])
            ->get();
        }
        catch(Exception $error){
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }
        
        return $roles;

    }
}
