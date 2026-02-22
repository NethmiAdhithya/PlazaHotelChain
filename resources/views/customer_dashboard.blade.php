@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images/custome_dashboard.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>CUSTOMER DASHBOARD</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="dashboard-buttons-section">
            <div class="container">
                <button class="dashboard-btn"><a href="/customer_room_types">Room Types</a></button>
                <button class="dashboard-btn"><a href="/customer_book_residential_suite">Book Residential Suite</a></button>
                <button class="dashboard-btn"><a href="/customer_make_new_reservation">Make New Reservation</a></button>
                <button class="dashboard-btn"><a href="/customer_view_change_cancel_reservation">View /Change / Cancel Reservation</a></button>
                <button class="dashboard-btn"><a href="/customer_view_checkout">View Checkout</a></button>
                <button class="dashboard-btn"><a href="/customer_view_booking_history">View Booking History</a></button>
            </div>
        </section>

@endsection