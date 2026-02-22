@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>REPORTS</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<main>
        <section class="reports-list-section">
            <div class="container">
                <a href="/occupancy_report" class="report-link-button">Occupancy Report - Daily / Weekly / Monthly</a>
                <a href="/revenue_report" class="report-link-button">Revenue Report - Room / Extra Services</a>
                <a href="/no-show_customer_summary_report" class="report-link-button">No-show Summary - Date-wise</a>
            </div>
        </section>
    </main>

@endsection