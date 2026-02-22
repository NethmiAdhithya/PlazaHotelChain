<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelCompanyRoomTypesController extends Controller
{
    public function index()
    {
        return view("travel_company_room_types");
    }
}
