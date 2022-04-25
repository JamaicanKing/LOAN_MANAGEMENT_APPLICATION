<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Exception;
use PhpParser\Node\Expr\AssignOp\Concat;
use PhpParser\Node\Expr\BinaryOp\Concat as BinaryOpConcat;


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
        'loan_status_id',
        'repayment_cycle',
        'name_on_account',
        'account_number',
        'account_type',
        'created_by',
        
        
    ];

    static function getAllLoans(){

        $loanDetails = new Collection();

        try{
            $loanDetails = DB::table('loan_details as ld')
            ->join('users','ld.user_id','=','users.id')
            ->join('interest_rates as ir','ld.interest_rate_id',"=",'ir.id')
            ->select(
                    [
                    'ld.id as loanId',
                    DB::raw("concat(users.firstname  ,' ',users.lastname) as name"),
                    'ir.rate',
                    'ld.interest_start_date',
                    'loan_amount',
                    'receive_method'
                    ])->get();
        }
        catch(Exception $error){
            Log::error("Error trying to roles from roles Table" . $error->getMessage());
        }
        
        return $loanDetails;

    }

}
