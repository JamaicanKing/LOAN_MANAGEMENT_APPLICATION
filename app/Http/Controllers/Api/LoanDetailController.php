<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanDetail;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class LoanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

          
        if(Auth::user()->hasRole('superadministrator')){
            $loans = LoanDetail::getAllLoans();

            return Datatables::of($loans)->editColumn('action', function ($loans) {


            })
            ->addColumn('actions', function($loans){
                $editUrl = route('loan.edit', $loans->loanId);
                $deleteUrl = route('loan.destroy', $loans->loanId);
                $paymentUrl = route('payment.index',['id' => $loans->loanId]);
            
                return view('actions', compact('paymentUrl','editUrl', 'deleteUrl'));
            })
            ->rawColumns(['action' => 'action'])
            ->make(true);
            
        }else{
           $loans = LoanDetail::getLoanByUserId(Auth::user()->id); 
            return Datatables::of($loans)->editColumn('action', function ($loans) {
                

            })
            ->addColumn('actions', function($loans){
                $editUrl = route('loan.edit', $loans->loanId);
                $deleteUrl = route('loan.destroy', $loans->loanId);
                $paymentUrl = route('payment.index',['id' => $loans->loanId]);
            
                return view('actions', compact('paymentUrl','editUrl', 'deleteUrl'));
            })
            ->rawColumns(['action' => 'action'])
            ->make(true);
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
