<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadministrator')) {
                $payments = Payment::getAllpayments();


            return Datatables::of($payments)->editColumn('action', function ($payments) {
            })
                ->addColumn('actions', function ($payments) {
                    $editUrl = route('payment.edit', $payments->paymentId);
                    $deleteUrl = route('payment.destroy', $payments->paymentId);
            
                    return view('actions', compact('editUrl', 'deleteUrl'));
                })
                ->rawColumns(['action' => 'action'])
                ->make(true);
        }
    }
}
