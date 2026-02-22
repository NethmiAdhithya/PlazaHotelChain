<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClerkDashboardController extends Controller
{
    public function index()
    {
        return view("clerk_dashboard");
    }
}
