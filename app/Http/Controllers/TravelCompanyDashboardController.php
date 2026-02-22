<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelCompanyDashboardController extends Controller
{
    public function index()
    {
        return view("travel_company_dashboard");
    }
}
