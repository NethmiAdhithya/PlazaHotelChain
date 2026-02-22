@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>TRAVEL COMPANY DASHBOARD</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<main class="dashboard-content">
        <div class="container">
            <div class="button-grid">
                <button class="dashboard-button"><a href="/travel_company_booking">Booking</a></button>
                <button class="dashboard-button"><a href="/travel_company_room_types">Room Types</a></button>
                <button class="dashboard-button"><a href="/travel_company_view_checkout">View Checkout</a></button>
            </div>
        </div>
    </main>

@endsection