@extends('master')

@section('content')

<!-- header -->
<header class="hero-section">
        <div class="hero-image-container">
            <img src="images/hero.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="hero-content">
            <h1>Most relaxing place</h1>
        </div>
        <div class="booking-bar">
            <div class="container">
                <div class="booking-item">
                    <label for="guests">Hotel Branch</label>
                    <select id="guests">
                        <option value="">Select...</option>
                        <option value="1">Plaza Colombo</option>
                        <option value="2">Plaza Kandy</option>
                        <option value="3">Plaza Galle</option>
                        <option value="4">Plaza Nuwara Eliya</option>
                        <option value="5">Plaza Jaffna</option>
                    </select>
                </div>
                <div class="booking-item">
                    <label for="check-in">Check In</label>
                    <input type="date" id="check-in">
                </div>
                <div class="booking-item">
                    <label for="check-out">Check Out</label>
                    <input type="date" id="check-out">
                </div>
                <div class="booking-item">
                    <label for="guests">Adult</label>
                    <select id="guests">
                        <option value="1">1 Adult</option>
                        <option value="2">2 Adults</option>
                        <option value="3">3 Adults</option>
                        <option value="4">4 Adults</option>
                    </select>
                </div>
                <div class="booking-item">
                    <label for="guests">Children</label>
                    <select id="guests">
                        <option value="1">1 Children</option>
                        <option value="2">2 Children</option>
                        <option value="3">3 Children</option>
                        <option value="4">4 Children</option>
                    </select>
                </div>
                <button class="view-rooms-btn">VIEW ROOMS</button>
            </div>
        </div>
    </header><br><br><br><br>
    
<main>
        <section class="rooms-suites-section container">
            <h2><a name="gallery">Explore Luxury Roomes & Suites with Ease</a></h2>

            <div class="room-card-large">
                <div class="room-image">
                    <img src="images/suite_1_room.jpg" alt="Deluxe King Room">
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
                    <button class="read-more-btn">Read More</button>
                </div>
                <div class="room-image">
                    <img src="images/suite_2_room.jpg" alt="Standard Room">
                </div>
            </div>
        </section>

        <section class="room-types-section container">
            <h2><a name="RoomTypes">Room Types</a></h2>
            <div class="room-types-grid">
                <div class="room-type-card">
                    <img src="images/check in.jpg" alt="Family Room">
                    <h3>Family Room</h3>
                    <ul>
                        <li>Spacious for families - Sleeps 4</li>
                        <li>Suitable for groups</li>
                        <li>Daily Rate: LKR 50,000/night</li>
                    </ul>
                    <button class="book-now-btn">Book Now</button>
                </div>
                <div class="room-type-card">
                    <img src="images/room.jpg" alt="Premium Room">
                    <h3>Double Room</h3>
                    <ul>
                        <li>Sleeps 2</li>
                        <li>Seating area with sofa</li>
                        <li>Daily Rate: LKR 25,000/night</li>
                    </ul>
                    <button class="book-now-btn">Book Now</button>
                </div>
                <div class="room-type-card">
                    <img src="images/check out.jpg" alt="Suite Room">
                    <h3>Triple room</h3>
                    <ul>
                        <li>Sleeps 3</li>
                        <li>Minibar & coffee machine</li>
                        <li>Daily Rate: LKR 40,000/night</li>
                    </ul>
                    <button class="book-now-btn">Book Now</button>
                </div>
                <div class="room-type-card">
                    <img src="images/Deluxe King Room.jpg" alt="Classic Room">
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
                    <img src="images/offer1.jpg" alt="Romantic Escape">
                    <h3>🔖 Exclusive Travel Partner Deals</h3>
                    <p>Are you a travel company? <br> Book 3 or more rooms and enjoy exclusive discounts. <br> Billing made easy with direct invoicing!</p>
                    <button class="read-more-btn">Read More</button>
                </div>
                <div class="offer-card">
                    <img src="images/offer3.jpg" alt="Long Stay Deal">
                    <h3>🏡 Long Stay Savings!</h3>
                    <p>Enjoy the comfort of our Residential Suites for LKR 92,000/week or LKR 340,000/month. <br><br> Ideal for extended stays!</p><br>
                    <button class="read-more-btn">Read More</button>
                </div>
                <div class="offer-card">
                    <img src="images/offer2.jpg" alt="Weekend Getaway">
                    <h3>🕖 Hold Without Credit Card</h3>
                    <p>Reserve your room now without a credit card. <br> <br>Be sure to check in before 7:00 PM to keep your booking!</p><br>
                    <button class="read-more-btn">Read More</button>
                </div>
            </div>
        </section>
    </main>
@endsection