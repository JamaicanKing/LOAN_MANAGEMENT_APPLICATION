<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class CustomerDetail extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'street_address',
        'city',
        'state',
        'postal',
        'trn',
        'identification',
        'identification_number',
        'identification_expiration',
        'contact_person_name',
        'contact_person_address',
        'contact_person_number',
        'kinship',
        'length_of_relationship',
        
    ];

    static function getCustomerDetailsByUserId($id){
        try{
            $customerDetails = DB::table('customer_details as cd')
            ->join('users as u','cd.user_id','=','u.id')
            ->join('customer_employment_details as cmd','u.id','=','cmd.user_id')
            ->where("cd.user_id",'=',"$id")
            ->select(
                    [
                        'u.firstname',
                        'u.lastname',
                        'u.email',
                        'u.id',
                        'phone_number',
                        'address',
                        'street_address',
                        'city',
                        'state',
                        'postal',
                        'trn',
                        'identification',
                        'identification_number',
                        'identification_expiration',
                        'contact_person_name',
                        'contact_person_address',
                        'contact_person_number',
                        'kinship',
                        'length_of_relationship',
                        'name_of_employer',
                        'address_of_employer',
                        'position_held',
                        'tenure'
                    ])->get();

                    if($customerDetails){
                        return $customerDetails;
                    }
        }
        catch(Exception $error){
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }
        
        return [];
    }

}
