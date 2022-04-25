<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;


class InterestRate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rate',
        'minimum',
        'maximum',
    ];

    static function getAllRates(){

        $rates = new Collection();

        try{
            $rates = DB::table('interest_rates')
            ->select(['id','rate','minimum','maximum'])
            ->get();
        }
        catch(Exception $error){
            Log::error("Error trying to get interest rates for interest rates table" . $error->getMessage());
        }
        
        return $rates;

    }
}
