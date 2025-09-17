@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        {{-- Use asset() helper for public images and forward slashes --}}
        <img src="{{ asset('images\customer login.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>TRAVEL COMPANY DASHBOARD</h1>
    </div>
</header><br><br><br><br><br><br><br><br><br>

<main class="dashboard-content">
    <div class="container">
        <div class="button-grid">
            <button class="dashboard-button"><a href="{{ route('travel_company_room_types.index') }}">Room Types</a></button>
            <button class="dashboard-button"><a href="{{ route('travel_company_booking.create') }}">Booking</a></button>
            
            {{-- CORRECTED: Use route() helper with the defined route name --}}
            <button class="dashboard-button"><a href="{{ route('travel_company_view_checkout.index') }}">View Checkout</a></button>
        </div>
    </div>
</main>

@endsection