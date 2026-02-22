@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images\bllluuu.png') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>CHECK-IN</h1>
    </div>
</header><br><br><br><br><br><br>

<section class="checkin-form-section">
    <div class="form-container">
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

        {{-- Form to Find Reservation --}}
        <form action="{{ route('check_in.find') }}" method="POST" id="find-reservation-form">
            @csrf
            <div class="form-group reservation-id-group">
                <label for="reservation-id">Enter Reservation ID</label>
                <input type="text" id="reservation-id" name="reservation_id" placeholder="e.g., 123">
                <button type="submit" class="find-btn">FIND</button>
            </div>
        </form>

        <div class="or-separator">OR</div>

        {{-- Main Check-in Form --}}
        <form action="{{ route('check_in.process') }}" method="POST" id="check-in-form">
            @csrf

            @if($reservation) {{-- Use $reservation directly now that it's always defined (null or object) --}}
                {{-- Hidden input to carry reservation ID if found --}}
                <input type="hidden" name="reservation_id_hidden" value="{{ $reservation->id }}">
                <div class="reservation-details">
                    <h3>Reservation Details (ID: {{ $reservation->id }})</h3>
                    <p><strong>Name:</strong> {{ $reservation->name }}</p>
                    <p><strong>NIC:</strong> {{ $reservation->nic }}</p>
                    <p><strong>Phone:</strong> {{ $reservation->phone }}</p>
                    <p><strong>Email:</strong> {{ $reservation->email }}</p>
                    <p><strong>Hotel Branch:</strong> {{ ucfirst($reservation->hotel_branch) }}</p>
                    <p><strong>Total Guests (Reservation):</strong> {{ $reservation->total_guests }}</p>
                    <p><strong>Check-In Date (Reserved):</strong> {{ $reservation->check_in_date->format('Y-m-d') }}</p>
                    <p><strong>Check-Out Date (Reserved):</strong> <span id="reserved_check_out_date">{{ $reservation->check_out_date->format('Y-m-d') }}</span></p>

                    <h4>Reserved Room(s):</h4>
                    <ul>
                        @foreach($reservation->rooms as $reservedRoom)
                            <li>{{ $reservedRoom->num_rooms }} x {{ ucfirst($reservedRoom->room_type) }} rooms, for {{ $reservedRoom->guests_in_room }} guests per room</li>
                        @endforeach
                    </ul>
                    <hr>
                </div>
            @endif

            <div class="walkin-details">
                @unless($reservation) {{-- Changed from isset($reservation) to $reservation --}}
                    <h3>Walk-in Details:</h3>
                @else
                    <h3>Customer and Room Assignment:</h3>
                @endunless

                <div class="form-group">
                    <label for="walkin-name">Name</label>
                    {{-- Use optional($reservation)->name to safely access properties on a potentially null object --}}
                    <input type="text" id="walkin-name" name="walkin_name" value="{{ old('walkin_name', optional($reservation)->name) }}" {{ $reservation ? 'readonly' : 'required' }}>
                </div>
                <div class="form-group">
                    <label for="walkin-nic">NIC</label>
                    <input type="text" id="walkin-nic" name="walkin_nic" value="{{ old('walkin_nic', optional($reservation)->nic) }}" {{ $reservation ? 'readonly' : 'required' }}>
                </div>
                <div class="form-group">
                    <label for="walkin-phone">Phone Number</label>
                    <input type="tel" id="walkin-phone" name="walkin_phone" value="{{ old('walkin_phone', optional($reservation)->phone) }}" {{ $reservation ? 'readonly' : 'required' }}>
                </div>
                <div class="form-group">
                    <label for="walkin-email">Email</label>
                    <input type="email" id="walkin-email" name="walkin_email" value="{{ old('walkin_email', optional($reservation)->email) }}" {{ $reservation ? 'readonly' : 'required' }}>
                </div>
                <div class="form-group">
                    <label for="walkin-hotel-branch">Hotel Branch</label>
                    <select id="walkin-hotel-branch" name="walkin_hotel_branch" {{ $reservation ? 'disabled' : 'required' }}>
                        <option value="">Select...</option>
                        <option value="colombo" {{ (old('walkin_hotel_branch', optional($reservation)->hotel_branch) == 'colombo') ? 'selected' : '' }}>Plaza Colombo</option>
                        <option value="kandy" {{ (old('walkin_hotel_branch', optional($reservation)->hotel_branch) == 'kandy') ? 'selected' : '' }}>Plaza Kandy</option>
                        <option value="galle" {{ (old('walkin_hotel_branch', optional($reservation)->hotel_branch) == 'galle') ? 'selected' : '' }}>Plaza Galle</option>
                        <option value="nuwaraeliya" {{ (old('walkin_hotel_branch', optional($reservation)->hotel_branch) == 'nuwaraeliya') ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
                        <option value="jafna" {{ (old('walkin_hotel_branch', optional($reservation)->hotel_branch) == 'jafna') ? 'selected' : '' }}>Plaza Jaffna</option>
                    </select>
                    {{-- If disabled, ensure value is still sent with hidden input --}}
                    @if($reservation)
                        <input type="hidden" name="walkin_hotel_branch" value="{{ $reservation->hotel_branch }}">
                    @endif
                </div>

                <div class="form-group">
                    <label for="room-type-for-assignment">Desired Room Type</label>
                    <select id="room-type-for-assignment" name="room_type_for_assignment">
                        <option value="">Select Room Type</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                        <option value="family">Family</option>
                        <option value="triple">Triple</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="available-rooms">Assign Room</label>
                    <select id="available-rooms" name="assigned_room_id" required>
                        <option value="">Select an Available Room</option>
                    </select>
                    <button type="button" class="assign-room-btn" id="fetch-rooms-btn">Fetch Available Rooms</button>
                </div>

                <div class="form-group">
                    <label for="check-in-guests">No. of Guests Checking In (for this room)</label>
                    {{-- Using optional($reservation)->total_guests to safely access property --}}
                    <input type="number" id="check-in-guests" name="check_in_guests" min="1" value="{{ old('check_in_guests', optional($reservation)->total_guests ?? 1) }}" required>
                </div>

                <div class="form-group">
                    <label for="expected-check-out-date-input">Expected Check-out Date</label>
                    {{-- Using optional($reservation)->check_out_date and then optional()->format() --}}
                    <input type="date" id="expected-check-out-date-input" name="expected_check_out_date_input" value="{{ old('expected_check_out_date_input', optional(optional($reservation)->check_out_date)->format('Y-m-d')) }}" required>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="checkin-btn">Check In</button>
                </div>
            </div>
        </form>

        {{-- Form to Update Check-out Date (can be shown after check-in, or for an existing check-in search) --}}
        {{-- You would typically load this if a check-in record is being viewed/edited,
             not directly on the initial check-in page. This would likely be a separate page or modal.
             For demonstration, I'll put it here, but advise against it for UX. --}}
        @if(false) {{-- Set to true if you want to display this form directly here --}}
            <hr>
            <h3>Update Check-out Date for an existing Check-in</h3>
            <form action="{{ route('check_in.update_checkout') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="existing-checkin-id">Check-in ID to Update</label>
                    <input type="text" id="existing-checkin-id" name="check_in_id" required>
                </div>
                <div class="form-group">
                    <label for="new-check-out-date">New Check-out Date</label>
                    <input type="date" id="new-check-out-date" name="new_check_out_date" required>
                </div>
                <button type="submit">Update Checkout Date</button>
            </form>
        @endif

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fetchRoomsBtn = document.getElementById('fetch-rooms-btn');
        const hotelBranchSelect = document.getElementById('walkin-hotel-branch');
        const roomTypeSelect = document.getElementById('room-type-for-assignment');
        const availableRoomsSelect = document.getElementById('available-rooms');
        const expectedCheckoutDateInput = document.getElementById('expected-check-out-date-input');

        // Initial state for expected checkout date based on reservation if present
        // Changed: check if reservedCheckOutDate element exists before accessing its textContent
        const reservedCheckOutDateElement = document.getElementById('reserved_check_out_date');
        if (reservedCheckOutDateElement) {
            expectedCheckoutDateInput.value = reservedCheckOutDateElement.textContent;
        }

        fetchRoomsBtn.addEventListener('click', function() {
            const branch = hotelBranchSelect.value;
            const roomType = roomTypeSelect.value;

            if (!branch) {
                alert('Please select a Hotel Branch first.');
                return;
            }
            if (!roomType) {
                alert('Please select a Desired Room Type.');
                return;
            }

            // Clear previous options
            availableRoomsSelect.innerHTML = '<option value="">Loading...</option>';

            // Fetch available rooms via AJAX
            fetch(`/get-available-rooms?branch=${branch}&room_type=${roomType}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(rooms => {
                    availableRoomsSelect.innerHTML = '<option value="">Select an Available Room</option>'; // Reset
                    if (rooms.length > 0) {
                        rooms.forEach(room => {
                            const option = document.createElement('option');
                            option.value = room.id;
                            option.textContent = `Room ${room.room_number} (${room.room_type} - $${room.price_per_night || 'N/A'})`;
                            availableRoomsSelect.appendChild(option);
                        });
                    } else {
                        availableRoomsSelect.innerHTML = '<option value="">No Rooms Available for this type/branch</option>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching rooms:', error);
                    availableRoomsSelect.innerHTML = '<option value="">Error loading rooms</option>';
                    alert('Failed to fetch available rooms. Please try again.');
                });
        });
    });
</script>

@endsection