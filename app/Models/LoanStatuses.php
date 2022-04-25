<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;

class LoanStatuses extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
    ];

    static function getAllStatuses(){

        $roles = new Collection();

        try{
            $roles = DB::table('loan_statuses')
            ->select(['id','status'])
            ->get();
        }
        catch(Exception $error){
            Log::error("Error trying to statuses from loan Statuses table" . $error->getMessage());
        }
        
        return $roles;

    }
}
