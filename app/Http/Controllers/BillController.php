<?php

namespace App\Http\Controllers;

use App\Bill;

class BillController
{
    public function index(){
        $bills = Bill::paginate(15);
        return view('admin.bill_dashboard',compact('bills'));
    }

}