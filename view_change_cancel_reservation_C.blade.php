@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        {{-- Corrected asset path for images --}}
        <img src="{{ asset('images/room.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>VIEW / CHANGE / CANCEL RESERVATION</h1>
    </div>
</header><br><br><br><br><br><br><br><br><br>

<main class="main-content">
    <div class="reservation-block container">
        {{-- Display success, error, or info messages --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        @if($allReservations->isEmpty())
            <p>You have no current reservations.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Res. ID</th>
                        <th>Type</th>
                        <th>Hotel</th>
                        <th>Guests</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                        <td>
                            @if($reservation->status == 'pending' || $reservation->status == 'confirmed')
                                {{-- Corrected Blade route helper syntax for the 'Change' button --}}
                                {{-- Changed from a button with JS to a direct anchor tag for simplicity and correctness --}}
                                <a href="{{ route('view_change_cancel_reservation.edit', ['type' => $reservation->reservation_type, 'id' => $reservation->id]) }}" class="btn btn-change-dates">Change</a>

                                {{-- Cancel Button (using a form for PUT request) --}}
                                <form action="{{ route('view_change_cancel_reservation.cancel', $reservation->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="reservation_type" value="{{ $reservation->reservation_type }}">
                                    <button type="submit" class="btn btn-cancel" onclick="return confirm('Are you sure you want to cancel this reservation?');">Cancel</button>
                                </form>
                            @else
                                <span class="text-muted">No actions available</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="reservation-actions">
            <button class="btn btn-make-payment"><a href="/customer_view_checkout">Make Payment</a></button>
        </div>
    </div>
</main>

@endsection

{{--
    The previous JavaScript function redirectToEdit and the DOMContentLoaded listener
    are no longer strictly needed for the "Change" button if you're using a direct <a> tag.
    If you have other JavaScript specific to this page that needs DOMContentLoaded,
    you can keep that part. I've commented out the `redirectToEdit` function
    as it's superseded by the direct `<a>` tag.
--}}
<script>
    /*
    function redirectToEdit(buttonElement) {
        const type = buttonElement.dataset.reservationType;
        const id = buttonElement.dataset.reservationId;

        // Construct the URL using the data attributes
        // Ensure this matches your web.php route for 'view_change_cancel_reservation.edit'
        const url = `/view_change_cancel_reservation_C/${type}/${id}/edit`;

        window.location.href = url; // Use href for navigation
    }
    */

    document.addEventListener('DOMContentLoaded', function () {
        // Any other JS that needs to run on DOM ready goes here
    });
</script>