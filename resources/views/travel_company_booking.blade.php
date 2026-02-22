@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>BOOKING</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="travel-booking-form-section">
            <div class="form-container">
                <form action="process_block_booking.php" method="POST">
                    <div class="form-group">
                        <label for="company-name">Company Name</label>
                        <input type="text" id="company-name" name="company_name" required>
                    </div>

                    <div class="form-group">
                        <label for="contact-email">Contact Email</label>
                        <input type="email" id="contact-email" name="contact_email" required>
                    </div>

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

      <label>No. of Guests (Total)</label>
      <input type="number" name="guests" min="1" required />
                    
                    <div class="form-group">
                        <label for="num-rooms">No. of Rooms:</label>
                        <input type="number" id="num-rooms" name="num_rooms" min="1" required>
                    </div>

                    <div class="form-group dates-group">
                        <label>Dates</label>
                        <div class="date-inputs">
                            <label for="date-from">From</label>
                            <input type="date" id="date-from" name="date_from" required><br><br>
                            <label for="date-to">To</label>
                            <input type="date" id="date-to" name="date_to" required>
                        </div>
                    </div>

                    <div class="form-group discount-group">
                        <label for="apply-discount">Apply Discount? <span class="note">[auto if >= 3 rooms]</span></label>
                        <input type="checkbox" id="apply-discount" name="apply_discount">
                    </div>

                    <div class="form-group payment-group">
                        <label for="payment-method">Payment</label>
                        <button type="button" class="payment-btn active" id="direct-bill-btn" data-method="Direct Bill">Direct Bill</button>
                        <input type="hidden" id="payment-method-hidden" name="payment_method" value="Direct Bill">
                    </div>

                    <button type="submit" class="submit-block-booking-btn">Submit Block Booking</button>
                </form>
            </div>
        </section>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numRoomsInput = document.getElementById('num-rooms');
            const applyDiscountCheckbox = document.getElementById('apply-discount');
            const directBillBtn = document.getElementById('direct-bill-btn');
            const paymentMethodHidden = document.getElementById('payment-method-hidden');

            // Set initial hidden payment method value
            paymentMethodHidden.value = directBillBtn.dataset.method;

            // Automatically check discount if rooms >= 3
            numRoomsInput.addEventListener('input', function() {
                if (parseInt(this.value) >= 3) {
                    applyDiscountCheckbox.checked = true;
                    applyDiscountCheckbox.disabled = false; // Enable if it was disabled for some reason
                } else {
                    applyDiscountCheckbox.checked = false;
                }
            });

            // Handle payment button click (though only one option is visible, good practice)
            directBillBtn.addEventListener('click', function() {
                // In this specific design, there's only one payment button visible,
                // so we just ensure it's active and its value is set.
                // If you add more payment options later, you'd iterate and manage active states.
                this.classList.add('active');
                paymentMethodHidden.value = this.dataset.method;
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const provideCreditBtn = document.getElementById('provide-credit');
            const withoutCreditBtn = document.getElementById('without-credit');
            const cardDetailsSection = document.getElementById('card-details-section');
            const addRoomBtn = document.getElementById('add-room-btn');
            const roomSelectionContainer = document.getElementById('room-selection-container');
            let roomCount = 0;

            function addRoomSelection() {
                roomCount++;
                const roomDiv = document.createElement('div');
                roomDiv.classList.add('room-selection-group');
                roomDiv.innerHTML = `
                    <h3>Room ${roomCount}</h3>
                    <label>Room Type</label>
                    <select name="room-type-${roomCount}" required>
                        <option value="">Select...</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                    </select><br><br>
                    <label>Number of Rooms</label>
                    <input type="number" name="num-rooms-${roomCount}" min="1" value="1" required /><br><br>
                    <label>Guests in Room ${roomCount}</label>
                    <input type="number" name="guests-room-${roomCount}" min="1" required />
                `;
                roomSelectionContainer.appendChild(roomDiv);
            }

            addRoomSelection();

            addRoomBtn.addEventListener('click', addRoomSelection);

            provideCreditBtn.addEventListener('click', function() {
                provideCreditBtn.classList.add('active');
                withoutCreditBtn.classList.remove('active');
                cardDetailsSection.style.display = 'block';
            });

            withoutCreditBtn.addEventListener('click', function() {
                withoutCreditBtn.classList.add('active');
                provideCreditBtn.classList.remove('active');
                cardDetailsSection.style.display = 'none';
            });


            if (provideCreditBtn.classList.contains('active')) {
                cardDetailsSection.style.display = 'block';
            } else {
                cardDetailsSection.style.display = 'none';
            }
        });
    </script>

@endsection