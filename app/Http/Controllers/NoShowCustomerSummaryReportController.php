<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoShowCustomerSummaryReportController extends Controller
{
    public function index()
    {
        return view("no-show_customer_summary_report");
    }
}
