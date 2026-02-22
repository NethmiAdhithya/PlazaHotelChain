<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerMakeNewReservationController extends Controller
{
    public function index()
    {
        return view("customer_make_new_reservation");
    }
}
