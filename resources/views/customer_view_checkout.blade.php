@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>VIEW CHECKOUT</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<main class="payment-content">
        <div class="container form-container">
            <form class="charges-form">
                <h2>Charges</h2>
                <div class="form-group">
                    <label for="roomRate">Room Rate</label>
                    <input type="text" id="roomRate" name="roomRate" value="" readonly>
                </div>

                <div class="form-group">
                    <label for="restaurant">Restaurant</label>
                    <input type="text" id="restaurant" name="restaurant" value="" readonly>
                </div>

                <div class="form-group">
                    <label for="laundry">Laundry, etc</label>
                    <input type="text" id="laundry" name="laundry" value="" readonly>
                </div>

                <div class="form-group">
                    <label for="lateCheckout">Late Check-out Fee (if any)</label>
                    <input type="text" id="lateCheckout" name="lateCheckout" value="" readonly>
                </div>

                <div class="form-group total-payment">
                    <label for="totalPayment">Total payment</label>
                    <input type="text" id="totalPayment" name="totalPayment" value="" readonly>
                </div>

                <button type="button" class="print-statement-button">Print Statement</button>
            </form>
        </div>
    </main>

@endsection