<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelCompanyViewCheckoutController extends Controller
{
    public function index()
    {
        return view("travel_company_view_checkout");
    }
}
