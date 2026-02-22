<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevenueReportController extends Controller
{
    public function index()
    {
        return view("revenue_report");
    }
}
