@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>VIEW / CHANGE / CALCEL RESERVATION</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<main class="main-content">
        <div class="reservation-block container">
            <table>
                <thead>
                    <tr>
                        <th>Res. ID</th>
                        <th>Room</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="reservation-actions">
                <button class="btn btn-cancel">Cancel</button>
                <button class="btn btn-change-dates">Change</button>
                <button class="btn btn-make-payment"><a href="/customer_view_checkout">Make Payment</a></button>
            </div>
        </div>
    </main>

@endsection