<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\LoanDetail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('superadministrator') || Auth::user()->hasRole('administrator')){
            $payment = Payment::getAllpayments();
            return view("payment.index",['payments' => $payment]);
        }
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $loan_detail_id = $id;

        return view('payment.create',['loanID' => $loan_detail_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $payment = Payment::create([
            'loan_details_id' =>  $request->input('loan_detail_id'),
                'paid_amount' => $request->input('paid_amount'),
                'proof_of_payment' => $request->input('proof_of_payment'),
                'method_of_payment' => $request->input('method_of_payment'),
                'payment_location' => $request->input('payment_location'),
                'time_of_payment' => $request->input('time_of_payment'),
                'reference_number' => $request->input('reference_number'),
        ]);

        if($payment){
            return redirect()->route('payment.index',['id' => $request->input('loan_detail_id')])->with('status', 'Payment SuccessFully Added');
        }else{
            return redirect()->route('payment.index')->with('status','Error Adding payment');
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
        if(Auth::user()->hasRole('superadministrator') || Auth::user()->hasRole('administrator')){
        $loan = LoanDetail::getLoanByUserIdAndLoanId($id);
        $payment = Payment::getAllpaymentsByLoanID($loan[0]->loanId);
        }
    
        return view("payment.index",['loan' => $loan,'payments' => $payment]);
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
        $payment = Payment::find($id);
        $payment->status = 'INACTIVE';

        return redirect()->route('payment.index')->with('status','Payment Information Deleted');
    }
}
