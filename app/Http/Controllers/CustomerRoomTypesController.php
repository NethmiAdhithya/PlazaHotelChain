<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerRoomTypesController extends Controller
{
    public function index()
    {
        return view("customer_room_types");
    }
}
