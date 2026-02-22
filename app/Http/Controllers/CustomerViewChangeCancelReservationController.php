<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerViewChangeCancelReservationController extends Controller
{
    public function index()
    {
        return view("customer_view_change_cancel_reservation");
    }
}
