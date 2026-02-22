@extends('master') {{-- Assuming 'master' is your main layout --}}

@section('content')
<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/room.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>Edit Reservation (ID: {{ $reservation->id }})</h1>
    </div><br><br><br><br><br><br><br><br><br><br>
</header>

<main class="main-content">

    <section class="edit-reservation-section" >
    <div class="form-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
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

        <form action="{{ route('clerk.reservations.update', $reservation) }}" method="POST">
            @csrf
            @method('PUT') {{-- Use PUT method for updates --}}

            <div class="form-group">
                <label for="name">Customer Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $reservation->name) }}" required>
            </div>
            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" id="nic" name="nic" value="{{ old('nic', $reservation->nic) }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', $reservation->phone) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $reservation->email) }}">
            </div>
            <div class="form-group">
                <label for="hotel_branch">Hotel Branch</label>
                <select id="hotel_branch" name="hotel_branch" required>
                    <option value="colombo" {{ (old('hotel_branch', $reservation->hotel_branch) == 'colombo') ? 'selected' : '' }}>Plaza Colombo</option>
                    <option value="kandy" {{ (old('hotel_branch', $reservation->hotel_branch) == 'kandy') ? 'selected' : '' }}>Plaza Kandy</option>
                    <option value="galle" {{ (old('hotel_branch', $reservation->hotel_branch) == 'galle') ? 'selected' : '' }}>Plaza Galle</option>
                    <option value="nuwaraeliya" {{ (old('hotel_branch', $reservation->hotel_branch) == 'nuwaraeliya') ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
                    <option value="jafna" {{ (old('hotel_branch', $reservation->hotel_branch) == 'jafna') ? 'selected' : '' }}>Plaza Jaffna</option>
                </select>
            </div>
            <div class="form-group">
                <label for="check_in_date">Check-in Date</label>
                <input type="date" id="check_in_date" name="check_in_date" value="{{ old('check_in_date', $reservation->check_in_date->format('Y-m-d')) }}" required>
            </div>
            <div class="form-group">
                <label for="check_out_date">Check-out Date</label>
                <input type="date" id="check_out_date" name="check_out_date" value="{{ old('check_out_date', $reservation->check_out_date->format('Y-m-d')) }}" required>
            </div>
            <div class="form-group">
                <label for="total_guests">Total Guests</label>
                <input type="number" id="total_guests" name="total_guests" min="1" value="{{ old('total_guests', $reservation->total_guests) }}" required>
            </div>
            <div class="form-group">
                <label for="status">Reservation Status</label>
                <select id="status" name="status" required>
                    <option value="pending" {{ (old('status', $reservation->status) == 'pending') ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ (old('status', $reservation->status) == 'confirmed') ? 'selected' : '' }}>Confirmed</option>
                    <option value="checked_in" {{ (old('status', $reservation->status) == 'checked_in') ? 'selected' : '' }}>Checked In</option>
                    <option value="canceled" {{ (old('status', $reservation->status) == 'canceled') ? 'selected' : '' }}>Canceled</option>
                    <option value="no_show" {{ (old('status', $reservation->status) == 'no_show') ? 'selected' : '' }}>No Show</option>
                    <option value="completed" {{ (old('status', $reservation->status) == 'completed') ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            {{-- You might also display reservation_rooms here and allow modification,
                but that requires more complex logic to manage room availability --}}

            <div class="form-buttons">
                <button type="submit" class="btn btn-primary">Update Reservation</button>
                <a href="{{ route('clerk.reservations.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</section>

</main>

@endsection