@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>CHECK-OUT</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="checkout-form-section">
            <div class="form-container">
                <form action="#" method="POST">
                    <div class="form-group room-id-group">
                        <label for="room-no-res-id">Enter Room No/ Res ID</label>
                        <input type="text" id="room-no-res-id" name="room_no_res_id" placeholder="e.g., 101 or PLZ12345">
                        <button type="submit" class="find-btn">FIND</button>
                    </div>

                    <h2 class="charges-heading">Charges</h2>

                    <div class="charges-grid">
                        <div class="form-group charge-item">
                            <label for="room-rate">Room Rate</label>
                            <input type="text" id="room-rate" name="room_rate" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="restaurant">Restaurant</label>
                            <input type="text" id="restaurant" name="restaurant" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="laundry">Laundry</label>
                            <input type="text" id="laundry" name="laundry" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="club-facility">Club facility</label>
                            <input type="text" id="club-facility" name="club_facility" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="auto-issuing-keys">Automatic issuing of keys</label>
                            <input type="text" id="auto-issuing-keys" name="auto_issuing_keys" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="room-service">Room Service</label>
                            <input type="text" id="room-service" name="room_service" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="telephone-service">Telephone Service</label>
                            <input type="text" id="telephone-service" name="telephone_service" readonly>
                        </div>
                        <div class="form-group charge-item">
                            <label for="late-checkout-fee">Late Check-out Fee (if any)</label>
                            <input type="text" id="late-checkout-fee" name="late_checkout_fee" readonly>
                        </div>
                        <div class="form-group charge-item total-payment">
                            <label for="total-payment">Total Payment</label>
                            <input type="text" id="total-payment" name="total_payment" readonly>
                        </div>
                    </div>

                    <div class="form-group payment-method-group">
                        <label for="payment-method-selector">Payment Method</label>
                        <div class="payment-options">
                            <button type="button" class="payment-btn active" data-method="Cash">Cash</button>
                            <button type="button" class="payment-btn" data-method="Credit Card">Credit Card</button>
                        </div>
                        <input type="hidden" id="payment-option-hidden" name="payment_option" value="Cash">
                    </div>

                    <div class="form-group card-info-group" id="card-details-section" style="display:none;">
                        <label>Card Details (if Credit Card selected)</label>
                        <div class="card-inputs">
                            <input type="text" id="card-number" name="card_number" placeholder="Card No" disabled />
                            <input type="text" id="card-exp" name="card_exp" placeholder="Exp (MM/YY)" disabled />
                            <input type="text" id="card-cvv" name="card_cvv" placeholder="CVV" disabled />
                        </div>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="generate-bill-btn">Generate Bill</button>
                        <button type="submit" class="print-statement-btn">Print Statement</button>
                    </div>
                </form>
            </div>
        </section>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const findReservationBtn = document.getElementById('findReservationBtn');
            const paymentBtns = document.querySelectorAll('.payment-btn');
            const cardDetailsSection = document.getElementById('card-details-section');
            const paymentOptionHidden = document.getElementById('payment-option-hidden');
            const cardNumberInput = document.getElementById('card-number');
            const cardExpInput = document.getElementById('card-exp');
            const cardCvvInput = document.getElementById('card-cvv');

            // Set initial payment option to Cash and hide card details
            paymentOptionHidden.value = "Cash";
            cardDetailsSection.style.display = 'none';
            cardNumberInput.disabled = true;
            cardExpInput.disabled = true;
            cardCvvInput.disabled = true;

            paymentBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove 'active' class from all buttons
                    paymentBtns.forEach(b => b.classList.remove('active'));
                    // Add 'active' class to the clicked button
                    this.classList.add('active');

                    const selectedMethod = this.dataset.method;
                    paymentOptionHidden.value = selectedMethod; // Update hidden input value

                    if (selectedMethod === "Credit Card") {
                        cardDetailsSection.style.display = 'block';
                        cardNumberInput.disabled = false;
                        cardExpInput.disabled = false;
                        cardCvvInput.disabled = false;
                        cardNumberInput.setAttribute('required', 'required'); // Make required if credit card
                        cardExpInput.setAttribute('required', 'required');
                        cardCvvInput.setAttribute('required', 'required');
                    } else {
                        cardDetailsSection.style.display = 'none';
                        cardNumberInput.disabled = true;
                        cardExpInput.disabled = true;
                        cardCvvInput.disabled = true;
                        cardNumberInput.removeAttribute('required'); // Remove required if not credit card
                        cardExpInput.removeAttribute('required');
                        cardCvvInput.removeAttribute('required');
                    }
                });
            });

            // This is a placeholder for the "FIND" button functionality.
            // In a real application, this would involve an AJAX request to your server.
            findReservationBtn.addEventListener('click', function() {
                const identifier = document.getElementById('room-no-res-id').value;
                if (identifier) {
                    console.log(`Attempting to find reservation/room details for: ${identifier}`);
                    // Here you would typically make an AJAX call to your backend
                    // Example: fetch('/api/get_reservation_charges?identifier=' + identifier)
                    // .then(response => response.json())
                    // .then(data => {
                    //     // Populate the readonly fields with data from the server
                    //     document.getElementById('room-rate').value = 'Rs. ' + data.room_rate.toFixed(2);
                    //     document.getElementById('restaurant').value = 'Rs. ' + data.restaurant.toFixed(2);
                    //     document.getElementById('laundry').value = 'Rs. ' + data.laundry.toFixed(2);
                    //     document.getElementById('club-facility').value = 'Rs. ' + data.club_facility.toFixed(2);
                    //     document.getElementById('auto-issuing-keys').value = 'Rs. ' + data.automatic_issuing_keys.toFixed(2);
                    //     document.getElementById('room-service').value = 'Rs. ' + data.room_service.toFixed(2);
                    //     document.getElementById('telephone-service').value = 'Rs. ' + data.telephone_service.toFixed(2);
                    //     document.getElementById('late-checkout-fee').value = 'Rs. ' + data.late_checkout_fee.toFixed(2);
                    //     document.getElementById('total-payment').value = 'Rs. ' + data.total_payment.toFixed(2);
                    // })
                    // .catch(error => {
                    //     console.error('Error fetching reservation data:', error);
                    //     alert('Reservation not found or an error occurred.');
                    //     // Clear fields if not found
                    //     document.getElementById('room-rate').value = 'Rs. 0.00';
                    //     document.getElementById('restaurant').value = 'Rs. 0.00';
                    //     document.getElementById('laundry').value = 'Rs. 0.00';
                    //     document.getElementById('club-facility').value = 'Rs. 0.00';
                    //     document.getElementById('auto-issuing-keys').value = 'Rs. 0.00';
                    //     document.getElementById('room-service').value = 'Rs. 0.00';
                    //     document.getElementById('telephone-service').value = 'Rs. 0.00';
                    //     document.getElementById('late-checkout-fee').value = 'Rs. 0.00';
                    //     document.getElementById('total-payment').value = 'Rs. 0.00';
                    // });

                    // Mock data for demonstration (remove in production)
                    const mockData = {
                        room_rate: 15000.00,
                        restaurant: 3500.50,
                        laundry: 750.00,
                        club_facility: 2000.00,
                        automatic_issuing_keys: 0.00,
                        room_service: 1200.00,
                        telephone_service: 150.00,
                        late_checkout_fee: 0.00
                    };
                    let total = 0;
                    for (const key in mockData) {
                        if (mockData.hasOwnProperty(key)) {
                            total += mockData[key];
                        }
                    }
                    mockData.total_payment = total;


                    document.getElementById('room-rate').value = 'Rs. ' + mockData.room_rate.toFixed(2);
                    document.getElementById('restaurant').value = 'Rs. ' + mockData.restaurant.toFixed(2);
                    document.getElementById('laundry').value = 'Rs. ' + mockData.laundry.toFixed(2);
                    document.getElementById('club-facility').value = 'Rs. ' + mockData.club_facility.toFixed(2);
                    document.getElementById('auto-issuing-keys').value = 'Rs. ' + mockData.automatic_issuing_keys.toFixed(2);
                    document.getElementById('room-service').value = 'Rs. ' + mockData.room_service.toFixed(2);
                    document.getElementById('telephone-service').value = 'Rs. ' + mockData.telephone_service.toFixed(2);
                    document.getElementById('late-checkout-fee').value = 'Rs. ' + mockData.late_checkout_fee.toFixed(2);
                    document.getElementById('total-payment').value = 'Rs. ' + mockData.total_payment.toFixed(2);
                    // End mock data
                } else {
                    alert('Please enter a Room No or Reservation ID.');
                }
            });
        });
    </script>

@endsection