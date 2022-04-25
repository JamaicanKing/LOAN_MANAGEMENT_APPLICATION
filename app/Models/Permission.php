<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    static function getAllPermissions(){

        $permissions = new Collection();

        try{
            $permissions = DB::table('permissions')
            ->select(['name','display_name','description'])
            ->get();
        }
        catch(Exception $error){
            Log::error("Error trying to permissions from permissions Table" . $error->getMessage());
        }
        
        return $permissions;
        
    }
    
}
