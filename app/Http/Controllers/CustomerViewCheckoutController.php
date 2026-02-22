<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerViewCheckoutController extends Controller
{
    public function index()
    {
        return view("customer_view_checkout");
    }
}
