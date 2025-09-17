@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        {{-- Use asset() helper for images --}}
        <img src="{{ asset('images\dark.png') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>TRAVEL COMPANY BOOKING</h1>
    </div>
</header><br><br><br><br><br><br><br><br>
{{-- Removed extra <br> tags, prefer CSS for spacing --}}
<div style="height: 80px;"></div> {{-- Add a div with height for spacing if needed for header overlap --}}

<main class="main-content booking-content"> {{-- Added booking-content class from your static example --}}
    <section class="travel-booking-form-section"> {{-- Added section from your static example --}}
        <div class="form-container">
            {{-- Laravel's error/success handling --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('travel_company_booking.store') }}" method="POST">
                @csrf

                <h2>Company Details</h2>
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="agent_name">Agent Name (Optional)</label>
                    <input type="text" id="agent_name" name="agent_name" value="{{ old('agent_name') }}">
                </div>

                <div class="form-group">
                    <label for="company_email">Company Email (Optional)</label>
                    <input type="email" id="company_email" name="company_email" value="{{ old('company_email') }}">
                </div>

                <div class="form-group">
                    <label for="company_phone">Company Phone (Optional)</label>
                    <input type="tel" id="company_phone" name="company_phone" value="{{ old('company_phone') }}">
                </div>

                <hr>

                <h2>Booking Details</h2>
                <div class="form-group">
                    <label for="hotel_branch">Hotel Branch</label>
                    {{-- Changed name from 'hotel-branch' to 'hotel_branch' for consistency and Laravel validation --}}
                    <select id="hotel_branch" name="hotel_branch" required>
                        <option value="">Select Branch</option>
                        <option value="colombo" {{ old('hotel_branch') == 'colombo' ? 'selected' : '' }}>Plaza Colombo</option>
                        <option value="kandy" {{ old('hotel_branch') == 'kandy' ? 'selected' : '' }}>Plaza Kandy</option>
                        <option value="galle" {{ old('hotel_branch') == 'galle' ? 'selected' : '' }}>Plaza Galle</option>
                        <option value="nuwaraeliya" {{ old('hotel_branch') == 'nuwaraeliya' ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
                        <option value="jafna" {{ old('hotel_branch') == 'jafna' ? 'selected' : '' }}>Plaza Jaffna</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="check_in_date">Check-in Date</label>
                    <input type="date" id="check_in_date" name="check_in_date" value="{{ old('check_in_date') }}" required>
                </div>

                <div class="form-group">
                    <label for="check_out_date">Check-out Date</label>
                    <input type="date" id="check_out_date" name="check_out_date" value="{{ old('check_out_date') }}" required>
                </div>

                <hr>

                <h3>Room Details</h3>
                <div id="room-sections-container"> {{-- Changed from room-selection-container to match previous working code --}}
                    {{-- Initial Room Section --}}
                    <div class="room-section">
                        <h4>Room 1</h4>
                        {{-- Removed remove button for first room if it's always there, add it back if needed --}}
                        <div class="form-group">
                            <label for="room_type_0">Room Type</label>
                            <select id="room_type_0" name="room_details[0][room_type]" required>
                                <option value="">Select Room Type</option>
                                <option value="Single" {{ old('room_details.0.room_type') == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Double" {{ old('room_details.0.room_type') == 'Double' ? 'selected' : '' }}>Double</option>
                                <option value="Suite" {{ old('room_details.0.room_type') == 'Suite' ? 'selected' : '' }}>Suite</option>
                                {{-- Add more hardcoded room types if needed --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="number_of_rooms_0">Number of Rooms (of this type)</label>
                            <input type="number" id="number_of_rooms_0" name="room_details[0][number_of_rooms]" value="{{ old('room_details.0.number_of_rooms', 1) }}" min="1" required>
                        </div>

                        <div class="form-group">
                            <label for="guests_per_room_0">Guests per Room</label>
                            <input type="number" id="guests_per_room_0" name="room_details[0][guests_per_room]" value="{{ old('room_details.0.guests_per_room', 1) }}" min="1" required>
                        </div>
                        <hr> {{-- Added HR for separation --}}
                    </div>
                </div>

                <button type="button" id="add-room-btn" class="btn btn-info">Add Another Room Section</button>
                <br><br>

                <div class="form-group">
                    <label for="total_guests">No. of Guests (Total)</label>
                    <input type="number" id="total_guests" name="total_guests" min="1" value="{{ old('total_guests') }}" required>
                </div>
                {{-- Removed redundant "No. of Rooms" input, as room_details[] already handles this --}}

                <div class="form-group discount-group">
                    <label for="apply-discount">Apply Discount? <span class="note">[auto if >= 3 rooms]</span></label>
                    {{-- Add 'disabled' attribute if old('apply_discount') is true, though JS will handle this dynamically --}}
                    <input type="checkbox" id="apply-discount" name="apply_discount" {{ old('apply_discount') ? 'checked' : '' }} >
                </div>

                <div class="form-group payment-group">
                    <label for="payment-method">Payment</label>
                    {{-- Use a single hidden input for payment method if only "Direct Bill" is an option --}}
                    <button type="button" class="payment-btn active" id="direct-bill-btn" data-method="Direct Bill">Direct Bill</button>
                    <input type="hidden" id="payment-method-hidden" name="payment_method" value="Direct Bill">
                </div>

                <button type="submit" class="btn btn-primary">Submit Booking</button>
                <a href="{{ route('travel-company.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            </form>
        </div>
    </section>
</main>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let roomSectionCount = document.querySelectorAll('#room-sections-container .room-section').length;

        const addRoomBtn = document.getElementById('add-room-btn');
        const roomSectionsContainer = document.getElementById('room-sections-container');
        const applyDiscountCheckbox = document.getElementById('apply-discount');
        const directBillBtn = document.getElementById('direct-bill-btn');
        const paymentMethodHidden = document.getElementById('payment-method-hidden');

        // --- Room Section Logic (already good) ---
        if (addRoomBtn && roomSectionsContainer) {
            addRoomBtn.addEventListener('click', function() {
                const newRoomSection = document.createElement('div');
                newRoomSection.classList.add('room-section');

                const roomTypeOptions = Array.from(document.querySelector('.room-section select[name*="[room_type]"]').options)
                                                .map(option => `<option value="${option.value}">${option.textContent}</option>`)
                                                .join('');

                newRoomSection.innerHTML = `
                    <h4>Room #${roomSectionCount + 1} <button type="button" class="btn btn-danger btn-sm remove-room-btn" style="float: right;">Remove</button></h4>
                    <div class="form-group">
                        <label for="room_type_${roomSectionCount}">Room Type</label>
                        <select id="room_type_${roomSectionCount}" name="room_details[${roomSectionCount}][room_type]" required>
                            ${roomTypeOptions}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="number_of_rooms_${roomSectionCount}">Number of Rooms (of this type)</label>
                        <input type="number" id="number_of_rooms_${roomSectionCount}" name="room_details[${roomSectionCount}][number_of_rooms]" value="1" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="guests_per_room_${roomSectionCount}">Guests per Room</label>
                        <input type="number" id="guests_per_room_${roomSectionCount}" name="room_details[${roomSectionCount}][guests_per_room]" value="1" min="1" required>
                    </div>
                    <hr>
                `;
                roomSectionsContainer.appendChild(newRoomSection);

                newRoomSection.querySelector('.remove-room-btn').addEventListener('click', function() {
                    newRoomSection.remove();
                    updateTotalRoomsAndDiscount(); // Call update when a room is removed
                });

                roomSectionCount++;
                updateTotalRoomsAndDiscount(); // Call update when a room is added
            });

            document.querySelectorAll('.remove-room-btn').forEach(button => {
                button.addEventListener('click', function() {
                    button.closest('.room-section').remove();
                    updateTotalRoomsAndDiscount(); // Call update when an initial room is removed
                });
            });
        } else {
            console.error("Add room button or container not found. Check IDs in HTML.");
        }

        // --- Discount Logic ---
        function calculateTotalRooms() {
            let total = 0;
            document.querySelectorAll('[name*="[number_of_rooms]"]').forEach(input => {
                total += parseInt(input.value) || 0;
            });
            return total;
        }

        function updateTotalRoomsAndDiscount() {
            const totalRooms = calculateTotalRooms();
            if (totalRooms >= 3) {
                applyDiscountCheckbox.checked = true;
                applyDiscountCheckbox.disabled = true; // IMPORTANT: Disable the checkbox
            } else {
                applyDiscountCheckbox.checked = false;
                applyDiscountCheckbox.disabled = false; // IMPORTANT: Re-enable if below threshold
            }
        }

        // Initial check on page load
        updateTotalRoomsAndDiscount();

        // Listen for changes on all number of rooms inputs
        roomSectionsContainer.addEventListener('input', function(event) {
            if (event.target.matches('[name*="[number_of_rooms]"]')) {
                updateTotalRoomsAndDiscount();
            }
        });

        // --- Payment Method Logic (already good) ---
        if (directBillBtn && paymentMethodHidden) {
            paymentMethodHidden.value = directBillBtn.dataset.method; // Set initial value
            directBillBtn.addEventListener('click', function() {
                this.classList.add('active');
                paymentMethodHidden.value = this.dataset.method;
            });
        }
    });
</script>
@endpush

@endsection