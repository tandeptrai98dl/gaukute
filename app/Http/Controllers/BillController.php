<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Bill;

class BillController
{
    public function index(){
        $bills = DB::table('bills')
        ->join('customer', 'bills.customer_id', '=', 'customer.id')
        ->select('bills.*', 'customer.name')
        ->get();
        return view('admin.bill_dashboard',compact('bills'));
    }

}