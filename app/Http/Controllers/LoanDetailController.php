<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetail;
use Illuminate\Http\Request;
use App\Models\LoanDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerEmploymentDetail;
use App\Models\InterestRate;
use App\Models\LoanStatuses;
use Exception;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('loan.index');
  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function overdue(Request $request)
    {
        
        return view('loan.overdue');
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customerDetails = CustomerDetail::getCustomerDetailsByUserId(Auth::user()->id);
        return view('loan.create',['customerDetail' => $customerDetails]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'. $extension;
            $path = $request->file('file')->storeAs('public',$fileNameToStore);
           
        }
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
            'contact_person_address' => $request->input('contact_person_address'),
            'email' =>   $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'secondary_contact' => $request->input('secondary_contact'),
            'address' => $request->input('address'),
            'street_address' => $request->input('street_address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postal' => $request->input('postal'),
            'trn' => $request->input('trn'),
            'identification' => file_get_contents($request->file('file')->path()),
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
                'receive_method' => $request->input('receive_method'),
                'maintainace_branch' => $request->input('maintainace_branch'),
                'balance' => $balance,
                'name_on_account' => $request->input('name_on_account'),
                'account_number' => $request->input('account_number'),
                'repayment_cycle' => $request->input('repayment_cycle'),
                'account_type' => $request->input('account_type'),
                'note' => $request->input('note'),
                'loan_status_id' => $statuses[0]->id,
                'created_by' => Auth::user()->id,
            ]);
        }

        if($LoanDetails){
            return redirect()->route('loan.index')->with('status', 'Your Loan Application has successfully been submitted');
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
        if(Auth::user()->hasRole('superadministrator') || Auth::user()->hasRole('administrator')){
            $loan = LoanDetail::getLoanById($id);
        }else{
        $loan = LoanDetail::getLoanByUserIdAndLoanId($id);
        }
        return view('loan.edit',['loan' => $loan]);
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
      
        if($request->input('repayment_cycle') == 'monthly'){
            $dueDate = date('Y-m-d',strtotime($request->input('interest_start_date'). ' + 30 days'));
        }elseif($request->input('repayment_cycle') == 'weekly'){
            $dueDate = date('Y-m-d',strtotime($request->input('interest_start_date'). ' + 7 days'));
        }elseif($request->input('repayment_cycle') == 'fortnightly'){
            $dueDate = date('Y-m-d',strtotime($request->input('interest_start_date'). ' + 14 days'));
        }
        if($request->hasFile('file')){
            $identification = file_get_contents($request->file('file')->path());
        }else {
            $identification = '';
        }
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
                $customerDetails = DB::table('customer_details')
                            ->where('user_id',$request->input('client_id'))
                            ->update([
                                'contact_person_address' => $request->input('contact_person_address'),
                                'phone_number' => $request->input('phone_number'),
                                'address' => $request->input('address'),
                                'street_address' => $request->input('street_address'),
                                'city' => $request->input('city'),
                                'state' => $request->input('state'),
                                'postal' => $request->input('postal'),
                                'trn' => $request->input('trn'),
                                'identification_number' => $request->input('identification_number'),
                                'identification_expiration' => $request->input('identification_expiration'),
                                'contact_person_name' => $request->input('contact_person_name'),
                                'contact_person_number' => $request->input('contact_person_number'),
                                'kinship' => $request->input('kinship'),
                                'length_of_relationship' => $request->input('length_of_relationship'),
                                    ]);

                    $employmentDetails = DB::table('customer_employment_details')
                    ->where('user_id','=',$request->input('client_id'))
                    ->update([
                        'name_of_employer' => $request->input('name_of_employer'),
                        'address_of_employer' => $request->input('address_of_employer'),
                        'position_held' => $request->input('position_held'),
                        'tenure' => $request->input('tenure'),
                    ]);
 
                    $LoanDetails = DB::table('loan_details')
                    ->where('id','=',"$id")
                    ->update(
                        [
                        'interest_start_date' => $request->input('interest_start_date'),
                        'loan_amount' => $request->input('loan_amount'),
                        'loan_amount_string' => $request->input('loan_amount_string'),
                        'receive_method' => $request->input('received_method'),
                        'maintainace_branch' => $request->input('maintainace_branch'),
                        'due_date' => $dueDate,
                        'name_on_account' => $request->input('name_on_account'),
                        'account_type' => $request->input('account_type'),
                        'note' => $request->input('note'),
                        'loan_status_id' => $request->input('status'),
                        'updated_by' => Auth::user()->id,
                        'repayment_cycle' => $request->input('repayment_cycle'),
                    ]);

            return redirect()->route('loan.index')->with('status', 'Status Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = LoanDetail::find($id);
        $loan->status = 'INACTIVE';

        return redirect()->route('loan.index')->with('status','Payment Information Deleted');
    }

    public function downloadPDF(){
        $user = DB::select("Select
        cd.identification 
        From customer_details cd 
        inner join users on cd.user_id = users.id 
        where cd.user_id = 1");
        //dd($user);
        //$pdf = PDF::loadView('pdf', compact('user'));
        $filePath = storage_path() . DIRECTORY_SEPARATOR .'hello world.html';
        return PDF::loadFile($filePath)->save($user)->stream('download.pdf');
  
      }
}
