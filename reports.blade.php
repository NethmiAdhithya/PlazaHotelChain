{{-- resources/views/reports.blade.php --}}
@extends('master')

@section('content')
<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images\manager dashboard.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>REPORTS</h1>
    </div>
</header><br><br><br><br><br><br><br><br><br>

<main>
    <section class="reports-list-section">
        <div class="container">
            <a href="{{ route('occupancy_report.index') }}" class="report-link-button">Occupancy Report - Daily / Weekly / Monthly</a>
            <a href="{{ route('revenue_report.index') }}" class="report-link-button">Revenue Report - Room / Extra Services</a>

        </div>
    </section>
</main>
@endsection