@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>MANAGER DASHBOARD</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<main class="dashboard-content">
        <div class="container">
            <div class="button-grid">
                <button class="dashboard-button"><a href="/reports">View reports</a></button>
                <button class="dashboard-button">check-ins</button>
                <button class="dashboard-button">check-outs</button>
                <button class="dashboard-button">no-show guests</button>
                <button class="dashboard-button">pending actions</button>
            </div>
        </div>
    </main>

@endsection