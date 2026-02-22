@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/room.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>MAKE NEW RESERVATION</h1>
    </div>
</header><br><br><br><br><br><br><br><br><br>

<section class="reservation-form">
    <form method="POST" action="{{ route('make_new_reservation.store') }}">
        @csrf {{-- IMPORTANT: Laravel CSRF token for security --}}

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Display Success/Error Messages from Controller --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required />

        <label>NIC</label>
        <input type="text" name="nic" value="{{ old('nic') }}" required />

        <label>Phone number</label>
        <input type="tel" name="phone" value="{{ old('phone') }}" required />

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required />

        <label>Hotel Branch</label>
        <select name="hotel_branch" required> {{-- Changed name from 'hotel-branch' to 'hotel_branch' --}}
            <option value="">Select...</option>
            <option value="colombo" {{ old('hotel_branch') == 'colombo' ? 'selected' : '' }}>Plaza Colombo</option>
            <option value="kandy" {{ old('hotel_branch') == 'kandy' ? 'selected' : '' }}>Plaza Kandy</option>
            <option value="galle" {{ old('hotel_branch') == 'galle' ? 'selected' : '' }}>Plaza Galle</option>
            <option value="nuwaraeliya" {{ old('hotel_branch') == 'nuwaraeliya' ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
            <option value="jafna" {{ old('hotel_branch') == 'jafna' ? 'selected' : '' }}>Plaza Jaffna</option>
        </select>

        <div id="room-selection-container">
            {{-- Dynamic room selection inputs will be appended here by JavaScript --}}
        </div>
        <button type="button" id="add-room-btn">Add Another Room</button>

        <label>No. of Guests (Total)</label>
        <input type="number" name="total_guests" min="1" value="{{ old('total_guests') }}" required /> {{-- Changed name from 'guests' to 'total_guests' --}}

        <label>Check-In Date</label>
        <input type="date" name="check_in_date" value="{{ old('check_in_date') }}" required /> {{-- Changed name from 'checkin' to 'check_in_date' --}}

        <label>Check-out Date</label>
        <input type="date" name="check_out_date" value="{{ old('check_out_date') }}" required /> {{-- Changed name from 'checkout' to 'check_out_date' --}}

        <h2>Payment Details</h2>
        <label>Payment Option</label>
        <div class="payment-options">
            {{-- Removed 'active' class here, JS will manage active state --}}
            <button type="button" id="provide-credit">Provide Credit Card</button>
            <button type="button" id="without-credit">Without Credit Card</button>
        </div>

        <div class="card-details-section" id="card-details-section">
            <label for="card-no">Card Number</label>
            <input type="text" id="card-no" name="card_number" value="{{ old('card_number') }}" placeholder="Card No" />

            <label for="card-exp">Expiration Date</label>
            <input type="text" id="card-exp" name="card_expiration" value="{{ old('card_expiration') }}" placeholder="MM/YY" /> {{-- Changed name from 'card_exp' to 'card_expiration' --}}

            <label for="card-cvv">CVV</label>
            <input type="text" id="card-cvv" name="card_cvv" value="{{ old('card_cvv') }}" placeholder="CVV" />
            <span class="note">(if chosen)</span>
        </div>

        <button type="submit" class="submit-btn">Submit Reservation</button>
    </form>
</section>

<div id="booking-data"
    data-old-card-number="{{ old('card_number') }}"
    data-has-card-number-error="{{ $errors->has('card_number') ? 'true' : 'false' }}"
    data-has-card-expiration-error="{{ $errors->has('card_expiration') ? 'true' : 'false' }}"
    data-has-card-cvv-error="{{ $errors->has('card_cvv') ? 'true' : 'false' }}"
    data-old-suite-duration="{{ old('suite_duration') }}">
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const provideCreditBtn = document.getElementById('provide-credit');
        const withoutCreditBtn = document.getElementById('without-credit');
        const cardDetailsSection = document.getElementById('card-details-section');
        const cardInputs = cardDetailsSection.querySelectorAll('input');
        const bookingDataElement = document.getElementById('booking-data');

        function showCardDetails() {
            cardDetailsSection.style.display = 'block';
            cardInputs.forEach(input => {
                input.removeAttribute('disabled');
            });
            provideCreditBtn.classList.add('active');
            withoutCreditBtn.classList.remove('active');
        }

        function hideCardDetails() {
            cardDetailsSection.style.display = 'none';
            cardInputs.forEach(input => {
                input.setAttribute('disabled', 'true');
            });
            withoutCreditBtn.classList.add('active');
            provideCreditBtn.classList.remove('active');
        }

        // --- Corrected JavaScript logic ---

        // Retrieve data from the HTML data attributes
        const oldCardNumber = bookingDataElement.dataset.oldCardNumber; // Will be a string or empty string if null
        const hasCardNumberError = bookingDataElement.dataset.hasCardNumberError === 'true';
        const hasCardExpirationError = bookingDataElement.dataset.hasCardExpirationError === 'true';
        const hasCardCvvError = bookingDataElement.dataset.hasCardCvvError === 'true';
        const oldSuiteDuration = bookingDataElement.dataset.oldSuiteDuration; // Will be a string or empty string if null

        let shouldShowCardDetailsOnLoad = false;

        // Now, perform all the conditional logic entirely in JavaScript
        if (
            oldCardNumber || // Check if string is not empty
            hasCardNumberError ||
            hasCardExpirationError ||
            hasCardCvvError
        ) {
            shouldShowCardDetailsOnLoad = true;
        }

        // Apply initial visibility based on JS variables
        if (shouldShowCardDetailsOnLoad) {
            showCardDetails();
        } else {
            // Default behavior if no old data or errors related to card,
            // check if provide-credit button is initially active in HTML
            if (!provideCreditBtn.classList.contains('active')) {
                hideCardDetails();
            } else {
                // If provide-credit is active by default in HTML, ensure it's visible
                showCardDetails();
            }
        }


        const addRoomBtn = document.getElementById('add-room-btn');
        const roomSelectionContainer = document.getElementById('room-selection-container');
        let roomCounter = 0; // To give unique names/IDs to dynamic inputs

        function addRoomInputs() {
            roomCounter++; // Increment counter for unique IDs/names

            const roomDiv = document.createElement('div');
            roomDiv.classList.add('room-group'); // Add a class for styling if needed

            roomDiv.innerHTML = `
                <hr> <h3>Room ${roomCounter}</h3>
                <label>Room Type</label>
                <select name="rooms[${roomCounter}][type]" required>
                    <option value="">Select Room Type</option>
                    <option value="family">Family</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="triple">Triple</option>
                </select><br><br>

                <label>Number of Rooms (of this type)</label>
                <input type="number" name="rooms[${roomCounter}][num_rooms]" min="1" value="1" required /><br><br>

                <label>Number of Guests in this Room Type</label>
                <input type="number" name="rooms[${roomCounter}][guests_in_room]" min="1" value="1" required /><br><br>

                <button type="button" class="remove-room-btn">Remove Room</button>
            `;

            roomSelectionContainer.appendChild(roomDiv);

            // Add event listener to the newly created "Remove Room" button
            roomDiv.querySelector('.remove-room-btn').addEventListener('click', function() {
                roomDiv.remove(); // Remove the entire room group div
            });
        }

        // Add event listener to the main "Add Another Room" button
        addRoomBtn.addEventListener('click', addRoomInputs);

        // Optionally, add one set of room inputs by default when the page loads
        // if (roomSelectionContainer.children.length === 0) {
        //     addRoomInputs();
        // }

        // If you want to retain old room input values after validation errors,
        // you'd need more complex JavaScript to re-render them based on old('rooms')
        // For now, new fields will just be blank.

        // =========================================================================
        // END NEW JAVASCRIPT
        // =========================================================================

    });
</script>

@endsection