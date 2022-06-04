<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Auth;



class LoanDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'loan_amount',
        'interest_rate_id',
        'interest_start_date',
        'loan_amount_string',
        'receive_method',
        'bank_id',
        'maintainace_branch',
        'balance',
        'due_date',
        'loan_status_id',
        'repayment_cycle',
        'name_on_account',
        'account_number',
        'account_type',
        'created_by',


    ];

    static function getAllLoans()
    {

        $loanDetails = new Collection();

        try {
            $loanDetails = DB::table('loan_details as ld')
                ->join('users', 'ld.user_id', '=', 'users.id')
                ->join('customer_details as cd', 'users.id', '=', 'cd.user_id')
                ->join('customer_employment_details as cmd', 'users.id', '=', 'cmd.user_id')
                ->join('interest_rates as ir', 'ld.interest_rate_id', "=", 'ir.id')
                ->join('loan_statuses as ls', 'ld.loan_status_id', '=', 'ls.id')
                ->leftjoin('payments as p', 'ld.id', '=', 'p.loan_details_id')
                ->select(
                    [
                        'ld.id as loanId',
                        'users.id as client_id',
                        'due_date',
                        'users.firstname',
                        DB::raw('round((ir.rate * ld.loan_amount),2) as interest_amount'),
                        DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                        'users.lastname',
                        'users.email',
                        'cd.phone_number',
                        'cd.address',
                        'cd.street_address',
                        'cd.city',
                        'ls.status',
                        'cd.state as state',
                        'cd.postal as postal',
                        'cd.trn',
                        'cd.identification',
                        'cd.identification_number',
                        'cd.identification_expiration',
                        'cd.contact_person_name',
                        'cd.contact_person_address',
                        'cd.contact_person_number',
                        'cd.kinship',
                        'cd.length_of_relationship',
                        'cmd.name_of_employer',
                        'cmd.address_of_employer',
                        'cmd.position_held',
                        'cmd.tenure',
                        'ir.rate',
                        'interest_start_date',
                        'loan_amount',
                        'loan_amount_string',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then balance - paid_amount
                            else balance
                        end as balance'),
                        'maintainace_branch',
                        'name_on_account',
                        'account_number',
                        'account_type',
                        'loan_status_id',
                        'number_of_repayments',
                        'repayment_cycle',
                        'note',
                        'ld.updated_by',
                        'ld.created_at',
                        'ld.updated_at',
                        'receive_method',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then paid_amount
                            else paid_amount = 0
                        end as paid_amount'),
                        'proof_of_payment',
                        'method_of_payment',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ]
                )->get();
        } catch (Exception $error) {
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }

        return $loanDetails;
    }

    static function getLoanById($id)
    {

        $loanDetails = new Collection();

        try {
            $loanDetails = DB::table('loan_details as ld')
                ->join('users', 'ld.user_id', '=', 'users.id')
                ->join('customer_details as cd', 'users.id', '=', 'cd.user_id')
                ->join('customer_employment_details as cmd', 'users.id', '=', 'cmd.user_id')
                ->join('interest_rates as ir', 'ld.interest_rate_id', "=", 'ir.id')
                ->join('loan_statuses as ls', 'ld.loan_status_id', '=', 'ls.id')
                ->leftjoin('payments as p', 'ld.id', '=', 'p.loan_details_id')
                ->where("ld.id", '=', "$id")
                ->select(
                    [
                        'ld.id as loanId',
                        'users.id as client_id',
                        'due_date',
                        'users.firstname',
                        DB::raw('round((ir.rate * ld.loan_amount),2) as interest_amount'),
                        DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                        'users.lastname',
                        'users.email',
                        'cd.phone_number',
                        'cd.address',
                        'cd.street_address',
                        'cd.city',
                        'ls.status',
                        'cd.state as state',
                        'cd.postal as postal',
                        'cd.trn',
                        'cd.identification',
                        'cd.identification_number',
                        'cd.identification_expiration',
                        'cd.contact_person_name',
                        'cd.contact_person_address',
                        'cd.contact_person_number',
                        'cd.kinship',
                        'cd.length_of_relationship',
                        'cmd.name_of_employer',
                        'cmd.address_of_employer',
                        'cmd.position_held',
                        'cmd.tenure',
                        'ir.rate',
                        'interest_start_date',
                        'loan_amount',
                        'loan_amount_string',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then balance - paid_amount
                            else balance
                        end as balance'),
                        'maintainace_branch',
                        'name_on_account',
                        'account_number',
                        'account_type',
                        'loan_status_id',
                        'number_of_repayments',
                        'repayment_cycle',
                        'note',
                        'ld.updated_by',
                        'ld.created_at',
                        'ld.updated_at',
                        'receive_method',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then paid_amount
                            else paid_amount = 0
                        end as paid_amount'),
                        'proof_of_payment',
                        'method_of_payment',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ]
                )->get();
        } catch (Exception $error) {
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }

        return $loanDetails;
    }

    static function getLoanByUserId($id)
    {

        $loanDetails = new Collection();

        try {
            $loanDetails = DB::table('loan_details as ld')
                ->join('users', 'ld.user_id', '=', 'users.id')
                ->join('customer_details as cd', 'users.id', '=', 'cd.user_id')
                ->join('customer_employment_details as cmd', 'users.id', '=', 'cmd.user_id')
                ->join('interest_rates as ir', 'ld.interest_rate_id', "=", 'ir.id')
                ->join('loan_statuses as ls', 'ld.loan_status_id', '=', 'ls.id')
                ->leftjoin('payments as p', 'ld.id', '=', 'p.loan_details_id')
                ->where("users.id", '=', "$id")
                ->select(
                    [
                        'ld.id as loanId',
                        'users.id as client_id',
                        'due_date',
                        'users.firstname',
                        DB::raw('round((ir.rate * ld.loan_amount),2) as interest_amount'),
                        DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                        'users.lastname',
                        'users.email',
                        'cd.phone_number',
                        'cd.address',
                        'cd.street_address',
                        'cd.city',
                        'ls.status',
                        'cd.state as state',
                        'cd.postal as postal',
                        'cd.trn',
                        'cd.identification',
                        'cd.identification_number',
                        'cd.identification_expiration',
                        'cd.contact_person_name',
                        'cd.contact_person_address',
                        'cd.contact_person_number',
                        'cd.kinship',
                        'cd.length_of_relationship',
                        'cmd.name_of_employer',
                        'cmd.address_of_employer',
                        'cmd.position_held',
                        'cmd.tenure',
                        'ir.rate',
                        'interest_start_date',
                        'loan_amount',
                        'loan_amount_string',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then balance - paid_amount
                            else balance
                        end as balance'),
                        'maintainace_branch',
                        'name_on_account',
                        'account_number',
                        'account_type',
                        'loan_status_id',
                        'number_of_repayments',
                        'repayment_cycle',
                        'note',
                        'ld.updated_by',
                        'ld.created_at',
                        'ld.updated_at',
                        'receive_method',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then paid_amount
                            else paid_amount = 0
                        end as paid_amount'),
                        'proof_of_payment',
                        'method_of_payment',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ]
                )->get();
        } catch (Exception $error) {
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }

        return $loanDetails;
    }

    static function getLoanByUserIdAndLoanId($id)
    {

        $loanDetails = new Collection();

        try {
            $loanDetails = DB::table('loan_details as ld')
                ->join('users', 'ld.user_id', '=', 'users.id')
                ->join('customer_details as cd', 'users.id', '=', 'cd.user_id')
                ->join('customer_employment_details as cmd', 'users.id', '=', 'cmd.user_id')
                ->join('interest_rates as ir', 'ld.interest_rate_id', "=", 'ir.id')
                ->join('loan_statuses as ls', 'ld.loan_status_id', '=', 'ls.id')
                ->leftjoin('payments as p', 'ld.id', '=', 'p.loan_details_id')
                ->where("users.id", '=', Auth::user()->id)
                ->where("ld.id", '=', "$id")
                ->select(
                    [
                        'ld.id as loanId',
                        'users.id as client_id',
                        'due_date',
                        DB::raw('round((ir.rate * ld.loan_amount),2) as interest_amount'),
                        'users.firstname',
                        DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                        'users.lastname',
                        'users.email',
                        'cd.phone_number',
                        'cd.address',
                        'cd.street_address',
                        'cd.city',
                        'ls.status',
                        'cd.state as state',
                        'cd.postal as postal',
                        'cd.trn',
                        'cd.identification',
                        'cd.identification_number',
                        'cd.identification_expiration',
                        'cd.contact_person_name',
                        'cd.contact_person_address',
                        'cd.contact_person_number',
                        'cd.kinship',
                        'cd.length_of_relationship',
                        'cmd.name_of_employer',
                        'cmd.address_of_employer',
                        'cmd.position_held',
                        'cmd.tenure',
                        'ir.rate',
                        'interest_start_date',
                        'loan_amount',
                        'loan_amount_string',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then balance - paid_amount
                            else balance
                        end as balance'),
                        'maintainace_branch',
                        'name_on_account',
                        'account_number',
                        'account_type',
                        'loan_status_id',
                        'number_of_repayments',
                        'repayment_cycle',
                        'note',
                        'ld.updated_by',
                        'ld.created_at',
                        'ld.updated_at',
                        'receive_method',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then paid_amount
                            else paid_amount = 0
                        end as paid_amount'),
                        'proof_of_payment',
                        'method_of_payment',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ]
                )->get();
        } catch (Exception $error) {
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }

        return $loanDetails;
    }

    static function getAllOverDueLoans()
    {

        $loanDetails = new Collection();
        $date = date("Y-m-d");

        try {
            $loanDetails = DB::table('loan_details as ld')
                ->join('users', 'ld.user_id', '=', 'users.id')
                ->join('customer_details as cd', 'users.id', '=', 'cd.user_id')
                ->join('customer_employment_details as cmd', 'users.id', '=', 'cmd.user_id')
                ->join('interest_rates as ir', 'ld.interest_rate_id', "=", 'ir.id')
                ->join('loan_statuses as ls', 'ld.loan_status_id', '=', 'ls.id')
                ->leftjoin('payments as p', 'ld.id', '=', 'p.loan_details_id')
                ->where('due_date','>=','2022-06-01')
                ->select(
                    [
                        'ld.id as loanId',
                        DB::raw("datediff(now(),due_date) as days_overdue"),
                        'users.id as client_id',
                        DB::raw('round((ir.rate * ld.loan_amount),2) as interest_amount'),
                        'due_date',
                        'users.firstname',
                        DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                        'users.lastname',
                        'users.email',
                        'cd.phone_number',
                        'cd.address',
                        'cd.street_address',
                        'cd.city',
                        'ls.status',
                        'cd.state as state',
                        'cd.postal as postal',
                        'cd.trn',
                        'cd.identification',
                        'cd.identification_number',
                        'cd.identification_expiration',
                        'cd.contact_person_name',
                        'cd.contact_person_address',
                        'cd.contact_person_number',
                        'cd.kinship',
                        'cd.length_of_relationship',
                        'cmd.name_of_employer',
                        'cmd.address_of_employer',
                        'cmd.position_held',
                        'cmd.tenure',
                        'ir.rate',
                        'interest_start_date',
                        'loan_amount',
                        'loan_amount_string',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then balance - paid_amount
                            else balance
                        end as balance'),
                        'maintainace_branch',
                        'name_on_account',
                        'account_number',
                        'account_type',
                        'loan_status_id',
                        'number_of_repayments',
                        'repayment_cycle',
                        'note',
                        'ld.updated_by',
                        'ld.created_at',
                        'ld.updated_at',
                        'receive_method',
                        DB::raw('case 
                        when paid_amount > 0 and confirmed = "yes" then paid_amount
                            else paid_amount = 0
                        end as paid_amount'),
                        'proof_of_payment',
                        'method_of_payment',
                        'time_of_payment',
                        'reference_number',
                        'confirmed'
                    ]
                )->get();
        } catch (Exception $error) {
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }

        return $loanDetails;
    }
}
