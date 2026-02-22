@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>CHECK-IN</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="checkin-form-section">
            <div class="form-container">
                <form action="#" method="POST">
                    <div class="form-group reservation-id-group">
                        <label for="reservation-id">Enter Reservation ID</label>
                        <input type="text" id="reservation-id" name="reservation_id" placeholder="e.g., PLZ12345">
                        <button type="submit" class="find-btn"><a href="/customer_view_change_cancel_reservation">FIN</a>D</button>
                    </div>

                    <div class="or-separator">OR</div>

                    <div class="walkin-details">
                        <h3>Walk-in Details:</h3>
                        <div class="form-group">
                            <label for="walkin-name">Name</label>
                            <input type="text" id="walkin-name" name="walkin_name">
                        </div>
                        <div class="form-group">
                            <label for="room-type">Room Type</label>
                            <input type="text" id="room-type" name="room_type">
                        </div>
                        <div class="form-group">
                            <label for="no-of-guests">No. of Guests</label>
                            <input type="number" id="no-of-guests" name="no_of_guests" min="1">
                        </div>
                        <div class="form-buttons">
                            <button type="button" class="assign-room-btn"><a href="/customer_make_new_reservation">Assign Room</a></button>
                            <button type="submit" class="checkin-btn">Check In</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

@endsection