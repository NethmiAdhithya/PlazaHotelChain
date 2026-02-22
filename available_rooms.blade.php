@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/room.jpg') }}" alt="Rooms Background" class="hero-image">
    </div>
    <div class="about-content">
        <h1>Available Rooms</h1>
        <p>Based on your search criteria</p>
    </div>
</header>

<div class="container mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Search Results</h2>

    {{-- Display search criteria --}}
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 text-center">
        <p><strong>Location:</strong> {{ $hotelBranch }}</p>
        <p><strong>Check-in:</strong> {{ $checkInDate }}</p>
        <p><strong>Check-out:</strong> {{ $checkOutDate }}</p>
        <p><strong>Guests:</strong> {{ $adults }} Adult(s){{ $children ? ' & ' . $children . ' Child(ren)' : '' }}</p>
    </div>

    {{-- Display messages (e.g., no rooms found) --}}
    @if (!empty($message))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{-- Display available rooms --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($availableRooms as $room)
            <div class="room-card bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('images/' . str_replace(' ', '_', strtolower($room->room_type)) . '.jpg') }}" 
                     alt="{{ $room->room_type }} Room" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $room->room_type }} - Room #{{ $room->room_number }}</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ $room->roomType->description ?? 'A comfortable room.' }}
                    </p>
                    <ul class="text-gray-700 text-sm mb-4">
                        <li><strong>Max Guests:</strong> {{ $room->roomType->max_guests ?? 'N/A' }}</li>
                        <li><strong>Branch:</strong> {{ $room->hotel_branch }}</li>
                        <li><strong>Status:</strong> {{ ucfirst($room->status) }}</li>
                    </ul>
                    <p class="text-xl font-bold text-indigo-700 mb-4">
                        LKR {{ number_format($room->price_per_night, 2) }} / night
                    </p>
                    <a href="#" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition duration-300">
                        Book Now
                    </a>
                </div>
            </div>
        @empty
            {{-- Message is already displayed above, this is a fallback --}}
        @endforelse
    </div>
</div>

@endsection

{{-- Tailwind CSS CDN (Optional, if not already in master.blade.php) --}}
{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

<style>
    /* Basic styling to make the cards look decent, adjust as per your master.blade.php styles */
    .mt-8 { margin-top: 2rem; }
    .mb-6 { margin-bottom: 1.5rem; }
    .mb-8 { margin-bottom: 2rem; }
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
    .rounded-md { border-radius: 0.375rem; }
    .bg-indigo-600 { background-color: #4f46e5; }
    .hover\:bg-indigo-700:hover { background-color: #4338ca; }
    .text-white { color: #fff; }
    .text-center { text-align: center; }
    .font-bold { font-weight: 700; }
    .text-2xl { font-size: 1.5rem; }
    .text-xl { font-size: 1.25rem; }
    .text-sm { font-size: 0.875rem; }
    .mb-2 { margin-bottom: 0.5rem; }
    .mb-4 { margin-bottom: 1rem; }
    .rounded-lg { border-radius: 0.5rem; }
    .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); }
    .overflow-hidden { overflow: hidden; }
    .w-full { width: 100%; }
    .h-48 { height: 12rem; }
    .object-cover { object-fit: cover; }
    .p-6 { padding: 1.5rem; }
    .text-gray-800 { color: #1f2937; }
    .text-gray-600 { color: #4b5563; }
    .text-gray-700 { color: #374151; }
    .text-indigo-700 { color: #4338ca; }
    .inline-block { display: inline-block; }
    .transition { transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter; }
    .duration-300 { transition-duration: 300ms; }
    .grid { display: grid; }
    .gap-8 { gap: 2rem; }
    .bg-white { background-color: #fff; }
    .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }

    /* Responsive grid columns */
    @media (min-width: 768px) { /* md breakpoint */
        .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }
    @media (min-width: 1024px) { /* lg breakpoint */
        .lg\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
</style>
