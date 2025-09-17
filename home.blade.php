@extends('master')

@section('content')

<!-- header -->
<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images/hero.jpg') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="hero-content">
        <h1>Most relaxing place</h1>
    </div><br><br><br><br><br><br><br><br><br><br>
    <div class="booking-bar">
        <div class="container">
            {{-- Wrap the booking bar items in a form --}}
            <form action="{{ route('rooms.available') }}" method="GET">
                <div class="booking-item">
                    <label for="hotel_branch">Hotel Branch</label>
                    <select id="hotel_branch" name="hotel_branch"> {{-- Added name attribute --}}
                        <option value="">Select...</option>
                        <option value="plaza-colombo" {{ old('hotel_branch') == 'plaza-colombo' ? 'selected' : '' }}>Plaza Colombo</option>
                        <option value="plaza-kandy" {{ old('hotel_branch') == 'plaza-kandy' ? 'selected' : '' }}>Plaza Kandy</option>
                        <option value="plaza-galle" {{ old('hotel_branch') == 'plaza-galle' ? 'selected' : '' }}>Plaza Galle</option>
                        <option value="plaza-nuwaraeliya" {{ old('hotel_branch') == 'plaza-nuwaraeliya' ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
                        <option value="plaza-jaffna" {{ old('hotel_branch') == 'plaza-jaffna' ? 'selected' : '' }}>Plaza Jaffna</option>
                    </select>
                </div>
                <div class="booking-item">
                    <label for="check_in_date">Check In</label>
                    <input type="date" id="check_in_date" name="check_in_date" value="{{ old('check_in_date') }}"> {{-- Added name attribute --}}
                </div>
                <div class="booking-item">
                    <label for="check_out_date">Check Out</label>
                    <input type="date" id="check_out_date" name="check_out_date" value="{{ old('check_out_date') }}"> {{-- Added name attribute --}}
                </div>
                <div class="booking-item">
                    <label for="adults">Adult</label>
                    <select id="adults" name="adults"> {{-- Added name attribute --}}
                        <option value="1" {{ old('adults', 1) == '1' ? 'selected' : '' }}>1 Adult</option>
                        <option value="2" {{ old('adults', 1) == '2' ? 'selected' : '' }}>2 Adults</option>
                        <option value="3" {{ old('adults', 1) == '3' ? 'selected' : '' }}>3 Adults</option>
                        <option value="4" {{ old('adults', 1) == '4' ? 'selected' : '' }}>4 Adults</option>
                    </select>
                </div>
                <div class="booking-item">
                    <label for="children">Children</label>
                    <select id="children" name="children"> {{-- Added name attribute --}}
                        <option value="0" {{ old('children', 0) == '0' ? 'selected' : '' }}>0 Children</option>
                        <option value="1" {{ old('children', 0) == '1' ? 'selected' : '' }}>1 Child</option>
                        <option value="2" {{ old('children', 0) == '2' ? 'selected' : '' }}>2 Children</option>
                        <option value="3" {{ old('children', 0) == '3' ? 'selected' : '' }}>3 Children</option>
                        <option value="4" {{ old('children', 0) == '4' ? 'selected' : '' }}>4 Children</option>
                    </select>
                </div>
                <button type="submit" class="view-rooms-btn">VIEW ROOMS</button> {{-- Changed to type="submit" --}}
            </form>
        </div>
    </div>
</header><br><br><br><br>

{{-- Rest of your home page content --}}
<main>
    <section class="rooms-suites-section container">
        <h2><a name="gallery">Explore Luxury Rooms & Suites with Ease</a></h2>

        {{-- These will eventually be dynamic too --}}
        <div class="room-card-large">
            <div class="room-image">
                <img src="{{ asset('images/suite_1_room.jpg') }}" alt="Deluxe King Room">
            </div>
            <div class="room-details">
                <h3>Deluxe King Room</h3>
                <ul>
                    <li>Room Name: Deluxe King Room <br>
                        Occupancy: Sleeps 2 Adults <br>
                        View: Ocean View <br>
                        Bed Type: 1 King Size Bed <br>
                        Amenities: Free Wi-Fi, Air Conditioning, <br>
                        Flat-Screen TV, Tea/Coffee Maker, Balcony <br>
                        Services: 24/7 Room Service, Laundry  <br>
                        Optional: Breakfast Buffet (LKR 2,000 per person) </li>
                </ul>
                <p class="price">LKR 38,000 per night</p>
                <button class="read-more-btn">Read More</button>
            </div>
        </div>

        <div class="room-card-large reverse">
            <div class="room-details">
                <h3>Residential Suite</h3>
                <ul>
                    <li>Room Name: Residential Suite  <br>
                        Occupancy: Sleeps up to 4 Guests   <br>
                        Facilities: Private Kitchenette, Dining Area    <br>
                        Bed Type: 2 Queen Size Beds        <br>
                        Features: Living Room, Fully Equipped Kitchen, Balcony <br>
                        Amenities: Free Wi-Fi, Flat-Screen TV, Air Conditioning <br>
                        Services: Room Service, Housekeeping twice a week   <br>
                        Stay Type: Weekly or Monthly       <br>
                        (Monthly rate available: LKR 340,000/month)* </li>
                </ul>
                <p class="price">LKR 92,000 per week</p>
                <button class="read-more-btn">Read More</button>
            </div>
            <div class="room-image">
                <img src="{{ asset('images/suite_2_room.jpg') }}" alt="Standard Room">
            </div>
        </div>
    </section>

    <section class="room-types-section container">
        <h2><a name="RoomTypes">Room Types</a></h2>
        <div class="room-types-grid">
            <div class="room-type-card">
                <img src="{{ asset('images/check in.jpg') }}" alt="Family Room">
                <h3>Family Room</h3>
                <ul>
                    <li>Spacious for families - Sleeps 4</li>
                    <li>Suitable for groups</li>
                    <li>Daily Rate: LKR 50,000/night</li>
                </ul>
                <button class="book-now-btn">Book Now</button>
            </div>
            <div class="room-type-card">
                <img src="{{ asset('images/room.jpg') }}" alt="Premium Room">
                <h3>Double Room</h3>
                <ul>
                    <li>Sleeps 2</li>
                    <li>Seating area with sofa</li>
                    <li>Daily Rate: LKR 25,000/night</li>
                </ul>
                <button class="book-now-btn">Book Now</button>
            </div>
            <div class="room-type-card">
                <img src="{{ asset('images/check out.jpg') }}" alt="Suite Room">
                <h3>Triple room</h3>
                <ul>
                    <li>Sleeps 3</li>
                    <li>Minibar & coffee machine</li>
                    <li>Daily Rate: LKR 40,000/night</li>
                </ul>
                <button class="book-now-btn">Book Now</button>
            </div>
            <div class="room-type-card">
                <img src="{{ asset('images/Deluxe King Room.jpg') }}" alt="Classic Room">
                <h3>Classic Room</h3>
                <ul>
                    <li>Sleeps 1</li>
                    <li>Private balcony</li>
                    <li>City or garden view</li>
                </ul>
                <button class="book-now-btn">Book Now</button>
            </div>
        </div>
    </section>

    <section class="special-offers-section container">
        <h2>Special Offers</h2>
        <div class="offers-grid">
            <div class="offer-card">
                <img src="{{ asset('images/offer1.jpg') }}" alt="Romantic Escape">
                <h3>🔖 Exclusive Travel Partner Deals</h3>
                <p>Are you a travel company? <br> Book 3 or more rooms and enjoy exclusive discounts. <br> Billing made easy with direct invoicing!</p>
                <button class="read-more-btn">Read More</button>
            </div>
            <div class="offer-card">
                <img src="{{ asset('images/offer3.jpg') }}" alt="Long Stay Deal">
                <h3>🏡 Long Stay Savings!</h3>
                <p>Enjoy the comfort of our Residential Suites for LKR 92,000/week or LKR 340,000/month. <br><br> Ideal for extended stays!</p><br>
                <button class="read-more-btn">Read More</button>
            </div>
            <div class="offer-card">
                <img src="{{ asset('images/offer2.jpg') }}" alt="Weekend Getaway">
                <h3>🕖 Hold Without Credit Card</h3>
                <p>Reserve your room now without a credit card. <br> <br>Be sure to check in before 7:00 PM to keep your booking!</p><br>
                <button class="read-more-btn">Read More</button>
            </div>
        </div>
    </section>
</main>
@endsection
