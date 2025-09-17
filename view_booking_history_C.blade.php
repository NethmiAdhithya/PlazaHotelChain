@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        {{-- Use asset() helper for images to ensure correct path --}}
        <img src="{{ asset('images/room.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>VIEW BOOKING HISTORY</h1>
    </div>
</header><br><br><br><br><br><br><br><br><br>

<main class="main-content">
    <div class="booking-table-container">
        @if ($allReservations->isEmpty())
            <p>You have no booking history to display.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Res. ID</th>
                        <th>Type</th> {{-- Added Type for clarity --}}
                        <th>Hotel</th>
                        <th>Guests</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allReservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ ucwords(str_replace('_', ' ', $reservation->reservation_type)) }}</td>
                            <td>{{ ucwords($reservation->hotel_branch) }}</td>
                            <td>
                                @if($reservation->reservation_type == 'regular')
                                    {{ $reservation->total_guests }}
                                @elseif($reservation->reservation_type == 'residential_suite')
                                    {{ $reservation->num_guests }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($reservation->check_in_date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->check_out_date)->format('Y-m-d') }}</td>
                            <td>{{ ucwords($reservation->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>

@endsection