<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerViewBookingHistoryController extends Controller
{
    public function index()
    {
        return view("customer_view_booking_history");
    }
}
