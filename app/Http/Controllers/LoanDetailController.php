<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetail;
use Illuminate\Http\Request;
use App\Models\LoanDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerEmploymentDetail;
use App\Models\InterestRate;
use App\Models\LoanStatuses;

class LoanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loanDetails = LoanDetail::getAllLoans();
        return view('loan.index',['loanDetails' => $loanDetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statuses = LoanStatuses::getAllStatuses();
        $interestrates = InterestRate::getAllRates();
        $interestRate = 0;
        $balance = 0;
        foreach($interestrates as  $rate => $value){
            if($request->input('loan_amount') >= $value->minimum && $request->input('loan_amount') <= $value->maximum){
                $interestRate = $value->id;
                $balance = ($request->input('loan_amount') * $value->rate) + $request->input('loan_amount');
            }
        }
        $customerDetails = CustomerDetail::create([
            'user_id' =>   Auth::user()->id,
            'contact_person_add' => $request->input('contact_person_address'),
            'email' =>   $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'street_address' => $request->input('street_address'),
            'city' => $request->input('city'),
            'state/province' => $request->input('state'),
            'postal/zip_code' => $request->input('postal'),
            'trn' => $request->input('trn'),
            'identification' => $request->file('file')->path(),
            'identification_number' => $request->input('identification_number'),
            'identification_expiration' => $request->input('identification_expiration'),
            'contact_person_name' => $request->input('contact_person_name'),
            'contact_person_number' => $request->input('contact_person_number'),
            'kinship' => $request->input('kinship'),
            'length_of_relationship' => $request->input('length_of_relationship'),
        ]);

        if($customerDetails){
            $employmentDetails = CustomerEmploymentDetail::create([
                'user_id' =>   Auth::user()->id,
                'name_of_employer' => $request->input('name_of_employer'),
                'address_of_employer' => $request->input('address_of_employer'),
                'position_held' => $request->input('position_held'),
                'tenure' => $request->input('tenure'),
            ]);
        }
       if($employmentDetails){
            $LoanDetails = LoanDetail::create([
                'user_id' =>   Auth::user()->id,
                'interest_rate_id' => $interestRate,
                'loan_duration' => $request->input('loan_duration'),
                'repayment_cylce' => $request->input('repayment_cylce'),
                'loan_amount' => $request->input('loan_amount'),
                'loan_amount_string' => $request->input('loan_amount_string'),
                'receive_method' => $request->input('received_method'),
                'maintainace_branch' => $request->input('maintainace_branch'),
                'balance' => $balance,
                'name_on_account' => $request->input('name_on_account'),
                'repayment_cycle' => $request->input('repayment_cycle'),
                'account_type' => $request->input('account_type'),
                'note' => $request->input('note'),
                'loan_status_id' => $statuses[0]->id,
                'created_by' => Auth::user()->id,
            ]);
        }

        if($LoanDetails){
            return redirect()->route('loan.index')->with('status', 'Status Successfully added');
        }else{
            return redirect()->route('loan.index')->with('status','Loan Application submission was unsuccessful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
