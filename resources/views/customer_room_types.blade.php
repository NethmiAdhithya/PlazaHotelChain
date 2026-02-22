@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>ROOM TYPES</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="rooms-suites-section container">
            <h2><a name="gallery">Explore Luxury Roomes & Suites with Ease</a></h2>

            <div class="room-card-large">
                <div class="room-image">
                    <img src="img/suite_1_room.jpg" alt="Deluxe King Room">
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
                    <button class="read-more-btn"><a href="/customer_book_residential_suite">Book Now</a></button>
                </div>
            </div>

            <div class="room-card-large reverse">
                <div class="room-details">
                    <h3>Residential Suite</h3>
                    <ul>
                        <li>Room Name: Residential Suite  <br>                        
                            Occupancy: Sleeps up to 4 Guests    <br>                   
                            Facilities: Private Kitchenette, Dining Area      <br>       
                            Bed Type: 2 Queen Size Beds                <br>            
                            Features: Living Room, Fully Equipped Kitchen, Balcony <br>
                            Amenities: Free Wi-Fi, Flat-Screen TV, Air Conditioning <br> 
                            Services: Room Service, Housekeeping twice a week   <br>
                            Stay Type: Weekly or Monthly       <br>                                  
                            (Monthly rate available: LKR 340,000/month)* </li>
                    </ul>
                    <p class="price">LKR 92,000 per week</p>
                    <button class="read-more-btn"><a href="/customer_book_residential_suite">Book Now</a></button>
                </div>
                <div class="room-image">
                    <img src="img/suite_2_room.jpg" alt="Standard Room">
                </div>
            </div>
        </section>

        <section class="room-types-section container">
            <h2><a name="RoomTypes">Room Types</a></h2>
            <div class="room-types-grid">
                <div class="room-type-card">
                    <img src="img/check in.jpg" alt="Family Room">
                    <h3>Family Room</h3>
                    <ul>
                        <li>Spacious for families - Sleeps 4</li>
                        <li>Suitable for groups</li>
                        <li>Daily Rate: LKR 50,000/night</li>
                    </ul>
                    <button class="book-now-btn"><a href="/customer_make_new_reservation">Book Now</a></button>
                </div>
                <div class="room-type-card">
                    <img src="img/room.jpg" alt="Premium Room">
                    <h3>Double Room</h3>
                    <ul>
                        <li>Sleeps 2</li>
                        <li>Seating area with sofa</li>
                        <li>Daily Rate: LKR 25,000/night</li>
                    </ul>
                    <button class="book-now-btn"><a href="/customer_make_new_reservation">Book Now</a></button>
                </div>
                <div class="room-type-card">
                    <img src="img/check out.jpg" alt="Suite Room">
                    <h3>Triple room</h3>
                    <ul>
                        <li>Sleeps 3</li>
                        <li>Minibar & coffee machine</li>
                        <li>Daily Rate: LKR 40,000/night</li>
                    </ul>
                    <button class="book-now-btn"><a href="/customer_make_new_reservation">Book Now</a></button>
                </div>
                <div class="room-type-card">
                    <img src="img/Deluxe King Room.jpg" alt="Classic Room">
                    <h3>Classic Room</h3>
                    <ul>
                        <li>Sleeps 1</li>
                        <li>Private balcony</li>
                        <li>City or garden view</li>
                    </ul>
                    <button class="book-now-btn"><a href="/customer_make_new_reservation">Book Now</a></button>
                </div>
            </div>
        </section>

@endsection