@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/room.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>CHANGE RESIDENTIAL SUITE BOOKING</h1>
    </div>
</header><br><br><br><br><br><br><br><br><br><br>

<main class="main-content">
    <div class="form-container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('view_change_cancel_reservation.update', ['type' => $type, 'id' => $reservation->id]) }}" method="POST">
            @csrf
            @method('PUT') {{-- Use PUT method for updates --}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $reservation->name) }}" required>
            </div>

            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" id="nic" name="nic" value="{{ old('nic', $reservation->nic) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $reservation->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $reservation->email) }}" required>
            </div>

            <div class="form-group">
                <label for="hotel_branch">Hotel Branch</label>
                <select id="hotel_branch" name="hotel_branch" required>
                    <option value="colombo" {{ old('hotel_branch', $reservation->hotel_branch) == 'colombo' ? 'selected' : '' }}>Colombo</option>
                    <option value="kandy" {{ old('hotel_branch', $reservation->hotel_branch) == 'kandy' ? 'selected' : '' }}>Kandy</option>
                    <option value="galle" {{ old('hotel_branch', $reservation->hotel_branch) == 'galle' ? 'selected' : '' }}>Galle</option>
                    <option value="nuwaraeliya" {{ old('hotel_branch', $reservation->hotel_branch) == 'nuwaraeliya' ? 'selected' : '' }}>Nuwara Eliya</option>
                    <option value="jafna" {{ old('hotel_branch', $reservation->hotel_branch) == 'jafna' ? 'selected' : '' }}>Jaffna</option>
                </select>
            </div>

            <div class="form-group">
                <label for="suite_duration">Suite Duration</label>
                <select id="suite_duration" name="suite_duration" required>
                    <option value="weekly" {{ old('suite_duration', $reservation->suite_duration) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ old('suite_duration', $reservation->suite_duration) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                </select>
            </div>

            <div class="form-group">
                <label for="num_guests">Number of Guests</label>
                <input type="number" id="num_guests" name="num_guests" value="{{ old('num_guests', $reservation->num_guests) }}" min="1" required>
            </div>

            <div class="form-group">
                <label for="check_in_date">Check-in Date</label>
                <input type="date" id="check_in_date" name="check_in_date" value="{{ old('check_in_date', \Carbon\Carbon::parse($reservation->check_in_date)->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="check_out_date">Check-out Date</label>
                <input type="date" id="check_out_date" name="check_out_date" value="{{ old('check_out_date', \Carbon\Carbon::parse($reservation->check_out_date)->format('Y-m-d')) }}" required>
            </div>

            {{-- You might also have fields for payment details, if they are editable --}}
            {{--
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" value="{{ old('card_number', $reservation->card_number) }}" required>
            </div>
            --}}

            <button type="submit" class="btn btn-primary">Update Booking</button>
            <a href="{{ route('view_change_cancel_reservation.index') }}" class="btn btn-secondary">Back to Reservations</a>
        </form>
    </div>
</main>

@endsection