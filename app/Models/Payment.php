<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Log;

class Payment extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

            'loan_details_id',
            'paid_amount',
            'collection_date',
            'proof_of_payment',
            'method_of_payment',
            'payment_location',
            'time_of_payment',
            'reference_number',
            'confirmed'
    ];

    static function getAllpaymentsByLoanID($id){

        try{
            $payments = DB::table('payments')
            ->where("loan_details_id",'=',"$id")
            ->select(
                    [
                        'id',
                        'users.id as customer_id',
                        'loan_details_id',
                        'paid_amount',
                        'collection_date',
                        'proof_of_payment',
                        'method_of_payment',
                        'payment_location',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ])->get();

                    if($payments){
                        return $payments;
                    }
        }
        catch(Exception $error){
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }
        
        return [];

    }

    static function getAllpayments(){

        try{
            $payments = DB::table('payments')
            ->join('loan_details','payments.loan_details_id','=','loan_details.id')
            ->join('users','loan_details.user_id','=','users.id')
            ->select(
                    [
                        'payments.id as paymentId',
                        'users.id as customerId',
                        DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                        'loan_details_id as loanId',
                        'paid_amount',
                        'proof_of_payment',
                        'method_of_payment',
                        'collection_date',
                        'payment_location',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ])->get();

                    if($payments){
                        return $payments;
                    }
        }
        catch(Exception $error){
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }
        
        return [];

    }

            
}
