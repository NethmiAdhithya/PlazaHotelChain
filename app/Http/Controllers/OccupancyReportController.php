<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OccupancyReportController extends Controller
{
    public function index()
    {
        return view("occupancy_report");
    }
}
