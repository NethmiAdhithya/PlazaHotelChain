@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>RESIDENTIAL SUITE BOOKING</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="reservation-form">
    <form>
      <label>Name</label>
      <input type="text" name="name" required />

      <label>NIC</label>
      <input type="text" name="nic" required />

      <label>Phone number</label>
      <input type="tel" name="phone" required />

      <label>Email</label>
      <input type="email" name="email" required />

      <label>Hotel Branch</label>
      <select name="hotel-branch" required>
        <option value="">Select...</option>
        <option value="colombo">Plaza Colombo</option>
        <option value="kandy">Plaza Kandy</option>
        <option value="galle">Plaza Galle</option>
        <option value="nuwaraeliya">Plaza Nuwara Eliya</option>
        <option value="jafna">Plaza Jaffna</option>
      </select>
      <div id="room-selection-container">
        </div>
      <button type="button" id="add-room-btn">Add Another Room</button>


      <div class="form-group">
        <label for="suite-type">Suite Type</label>
                    <div class="radio-buttons">
                        <input type="radio" id="weekly-suite" name="suite_duration" value="weekly">
                        <label for="weekly-suite" class="radio-label">Weekly</label>
                        <input type="radio" id="monthly-suite" name="suite_duration" value="monthly">
                        <label for="monthly-suite" class="radio-label">Monthly</label>
                    </div>
                </div>

      <label>No. of Guests (Total)</label>
      <input type="number" name="guests" min="1" required />

      <label>Check-In Date</label>
      <input type="date" name="checkin" required />

      <label>Check-out Date</label>
      <input type="date" name="checkout" required />

      <h2>Payment Details</h2>
      <label>Payment Option</label>
      <div class="payment-options">
        <button type="button" id="provide-credit" class="active">Provide Credit Card</button>
        <button type="button" id="without-credit">Without Credit Card</button>
      </div>

      <div class="card-details-section" id="card-details-section">
        <label for="card-no">Card Number</label>
        <input type="text" id="card-no" name="card_number" placeholder="Card No" />

        <label for="card-exp">Expiration Date</label>
        <input type="text" id="card-exp" name="card_exp" placeholder="MM/YY" />

        <label for="card-cvv">CVV</label>
        <input type="text" id="card-cvv" name="card_cvv" placeholder="CVV" />
        <span class="note">(if chosen)</span>
      </div>

      <button type="submit" class="submit-btn">Submit Reservation</button>
    </form>
  </section>

@endsection