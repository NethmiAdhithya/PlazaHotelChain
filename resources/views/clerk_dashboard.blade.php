@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>CLERK DASHBOARD</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<main class="dashboard-content">
        <div class="container">
            <div class="button-grid">
                <button class="dashboard-button"><a href="/check-in">Check in</a></button>
                <button class="dashboard-button"><a href="/check-out">Check out</a></button>
            </div>
        </div>
    </main>

@endsection