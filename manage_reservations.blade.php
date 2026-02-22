@extends('master') {{-- Assuming 'master' is your main layout --}}

@section('content')
<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images\bllluuu.png') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>Manage Reservations</h1>
    </div><br><br>
</header>

<section class="clerk-reservations-section">
    <div class="container">
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

        <form action="{{ route('clerk.reservations.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by ID, Name, NIC, Email..." value="{{ request('search') }}">
            <select name="status">
                <option value="all">All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="checked_in" {{ request('status') == 'checked_in' ? 'selected' : '' }}>Checked In</option>
                <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                <option value="no_show" {{ request('status') == 'no_show' ? 'selected' : '' }}>No Show</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            <button type="submit">Search / Filter</button>
        </form>

        @if($reservations->isEmpty())
            <p>No reservations found.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>NIC</th>
                            <th>Branch</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Guests</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->nic }}</td>
                                <td>{{ ucfirst($reservation->hotel_branch) }}</td>
                                <td>{{ $reservation->check_in_date->format('Y-m-d') }}</td>
                                <td>{{ $reservation->check_out_date->format('Y-m-d') }}</td>
                                <td>{{ $reservation->total_guests }}</td>
                                <td><span class="status-badge status-{{ str_replace(' ', '-', $reservation->status) }}">{{ ucfirst($reservation->status) }}</span></td>
                                <td>
                                    <a href="{{ route('clerk.reservations.edit', $reservation) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('clerk.reservations.cancel', $reservation) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm" {{ $reservation->status == 'canceled' || $reservation->status == 'checked_in' || $reservation->status == 'completed' ? 'disabled' : '' }}>Cancel</button>
                                    </form>
                                    {{-- Optional: Delete button (use with extreme caution) --}}
                                    {{--
                                    <form action="{{ route('clerk.reservations.destroy', $reservation) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you absolutely sure you want to DELETE this reservation? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $reservations->links() }} {{-- Pagination links --}}
        @endif
    </div>
</section><br><br><br><br><br><br>
@endsection