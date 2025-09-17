@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\bllluuu.png" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>CHECK-OUT</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

    <section class="checkin-form-section">
        <div class="form-container">
<section class="checkout-form-section w-full flex justify-center">
    <div class="container mx-auto p-6 lg:p-10 w-full max-w-4xl bg-white shadow-lg rounded-xl">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Customer Checkout</h2>

        <!-- Customer Search Section -->
        <div class="mb-8 p-6 bg-blue-50 rounded-lg shadow-inner">
            <h3 class="text-2xl font-medium mb-4 text-blue-700">Find Customer Reservation</h3>
            <div class="flex flex-col sm:flex-row gap-4 items-center">
                <input type="text" id="reservationInput" placeholder="Enter Reservation ID or NIC"
                       class="flex-1 p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-700 shadow-sm">
                <button id="searchCustomerBtn"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">
                    Search Customer
                </button>
            </div>
            <p id="searchMessage" class="mt-3 text-red-600 hidden"></p>
        </div>

        <!-- Reservation Details Section (Dynamically Populated) -->
        <div id="reservationDetails" class="hidden mb-8 p-6 bg-gray-50 rounded-lg shadow-inner">
            <h3 class="text-2xl font-medium mb-4 text-gray-800">Reservation Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div><strong>Name:</strong> <span id="customerName"></span></div>
                <div><strong>NIC:</strong> <span id="customerNic"></span></div>
                <div><strong>Phone:</strong> <span id="customerPhone"></span></div>
                <div><strong>Email:</strong> <span id="customerEmail"></span></div>
                <div><strong>Hotel Branch:</strong> <span id="hotelBranch"></span></div>
                <div><strong>Total Guests:</strong> <span id="totalGuests"></span></div>
                <div><strong>Check-in Date:</strong> <span id="checkInDate"></span></div>
                <div><strong>Check-out Date:</strong> <span id="checkOutDate"></span></div>
                <div><strong>Reservation Status:</strong> <span id="reservationStatus" class="font-semibold"></span></div>
            </div>
            <div id="lateCheckoutWarning" class="mt-4 p-3 bg-yellow-100 border border-yellow-400 text-yellow-800 rounded-lg hidden">
                <p><strong>Warning:</strong> Customer is checking out after the official checkout date. An additional night charge will be applied.</p>
            </div>
        </div>

        <!-- Optional Charges Section -->
        <div id="optionalChargesSection" class="hidden mb-8 p-6 bg-green-50 rounded-lg shadow-inner">
            <h3 class="text-2xl font-medium mb-4 text-green-700">Optional Charges</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Restaurant Charges -->
                <div>
                    <label for="restaurantCharges" class="block text-gray-700 text-sm font-bold mb-2">Restaurant Charges ($):</label>
                    <input type="number" id="restaurantCharges" value="0" min="0" step="0.01"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 text-gray-700 shadow-sm">
                </div>
                <!-- Room Service -->
                <div>
                    <label for="roomService" class="block text-gray-700 text-sm font-bold mb-2">Room Service ($):</label>
                    <input type="number" id="roomService" value="0" min="0" step="0.01"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 text-gray-700 shadow-sm">
                </div>
                <!-- Laundry -->
                <div>
                    <label for="laundry" class="block text-gray-700 text-sm font-bold mb-2">Laundry Charges ($):</label>
                    <input type="number" id="laundry" value="0" min="0" step="0.01"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 text-gray-700 shadow-sm">
                </div>
                <!-- Telephone Service -->
                <div>
                    <label for="telephoneService" class="block text-gray-700 text-sm font-bold mb-2">Telephone Service ($):</label>
                    <input type="number" id="telephoneService" value="0" min="0" step="0.01"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 text-gray-700 shadow-sm">
                </div>
                <!-- Automatic Issuing of Keys -->
                <div class="flex items-center">
                    <input type="checkbox" id="autoKeys" class="form-checkbox h-5 w-5 text-green-600 rounded focus:ring-green-500">
                    <label for="autoKeys" class="ml-2 text-gray-700">Automatic Issuing of Keys ($10.00)</label>
                </div>
                <!-- Club Facility -->
                <div class="flex items-center">
                    <input type="checkbox" id="clubFacility" class="form-checkbox h-5 w-5 text-green-600 rounded focus:ring-green-500">
                    <label for="clubFacility" class="ml-2 text-gray-700">Club Facility ($25.00)</label>
                </div>
            </div>
            <div class="mt-6 text-right text-gray-800">
                <strong class="text-xl">Current Subtotal: $<span id="currentSubtotal">0.00</span></strong>
            </div>
        </div>

        <!-- Payment Method Section -->
        <div id="paymentSection" class="hidden mb-8 p-6 bg-purple-50 rounded-lg shadow-inner">
            <h3 class="text-2xl font-medium mb-4 text-purple-700">Payment Method</h3>
            <div class="flex items-center space-x-6 mb-4">
                <label class="inline-flex items-center">
                    <input type="radio" name="paymentMethod" value="cash" checked class="form-radio h-5 w-5 text-purple-600 focus:ring-purple-500">
                    <span class="ml-2 text-gray-700">Cash</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="paymentMethod" value="creditCard" class="form-radio h-5 w-5 text-purple-600 focus:ring-purple-500">
                    <span class="ml-2 text-gray-700">Credit Card</span>
                </label>
            </div>

            <!-- Credit Card Details (hidden by default) -->
            <div id="creditCardDetails" class="grid grid-cols-1 md:grid-cols-2 gap-4 hidden">
                <div>
                    <label for="cardNumber" class="block text-gray-700 text-sm font-bold mb-2">Card Number:</label>
                    <input type="text" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 text-gray-700 shadow-sm">
                </div>
                <div>
                    <label for="cardExpiration" class="block text-gray-700 text-sm font-bold mb-2">Expiration Date (MM/YY):</label>
                    <input type="text" id="cardExpiration" placeholder="MM/YY"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 text-gray-700 shadow-sm">
                </div>
                <div>
                    <label for="cardCvv" class="block text-gray-700 text-sm font-bold mb-2">CVV:</label>
                    <input type="text" id="cardCvv" placeholder="XXX"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500 text-gray-700 shadow-sm">
                </div>
            </div>
            <p id="paymentValidationMessage" class="mt-3 text-red-600 hidden"></p>
        </div>

        <!-- Total Amount & Checkout Button -->
        <div id="checkoutSummary" class="hidden flex flex-col sm:flex-row justify-between items-center bg-gray-100 p-6 rounded-lg shadow-md">
            <div class="text-gray-800 mb-4 sm:mb-0">
                <strong class="text-2xl">Total Amount Due: $<span id="totalAmount">0.00</span></strong>
            </div>
            <button id="checkoutBtn"
                    class="px-8 py-4 bg-purple-700 text-white font-bold rounded-lg hover:bg-purple-800 transition duration-300 ease-in-out shadow-lg text-xl">
                Finalize Checkout
            </button>
        </div>
    </div>
    </div>
</section>
</section>
<!-- Checkout Statement Modal -->
<div id="statementModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-xl max-w-2xl w-full mx-4 relative">
        <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 text-2xl font-bold">&times;</button>
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Checkout Statement</h2>
        <div id="statementContent" class="prose max-w-none overflow-auto max-h-96 p-4 border border-gray-200 rounded-lg bg-gray-50">
            <!-- Statement content will be inserted here by JS -->
        </div>
        <div class="mt-6 text-center">
            <button onclick="window.print()" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">Print Statement</button>
        </div>
    </div>
</div>

<script>
    // Mock Data for Reservations
    // IMPORTANT: For a real application, this data should be fetched from your Laravel backend database.
    // This mock data is used only for frontend demonstration purposes.
    const mockReservations = [
        {
            id: '1', // Matching ID from your screenshot
            name: 'Nethmi Adhithya',
            nic: '200285505012', // Matching NIC from your screenshot
            phone: '0752694168',
            email: 'nethmiadhithya38@gmail.com',
            hotel_branch: 'colombo',
            total_guests: 1,
            check_in_date: '2025-07-10',
            check_out_date: '2025-07-12',
            card_number: null,
            card_expiration: null,
            card_cvv: null,
            status: 'confirmed',
            base_room_charge: 150.00 // Example base charge per night, adjust as needed
        },
        {
            id: '2', // Matching ID from your screenshot
            name: 'Sandhya Thennakoon',
            nic: '1974123456123456', // Matching NIC from your screenshot
            phone: '0705914747',
            email: 'Sandhya@gmail.com',
            hotel_branch: 'colombo',
            total_guests: 5,
            check_in_date: '2025-07-05',
            check_out_date: '2025-07-12',
            card_number: null,
            card_expiration: null,
            card_cvv: null,
            status: 'confirmed',
            base_room_charge: 200.00 // Example base charge per night, adjust as needed
        },
        {
            id: '3', // Matching ID from your screenshot
            name: 'John Doe',
            nic: '123456789V', // Matching NIC from your screenshot
            phone: '0771234567',
            email: 'john.doe@example.com',
            hotel_branch: 'colombo',
            total_guests: 2,
            check_in_date: '2025-06-18',
            check_out_date: '2025-08-23', // Adjusted to be a future date based on current date
            card_number: null, // Assuming no card info from your screenshot for this entry
            card_expiration: null,
            card_cvv: null,
            status: 'confirmed', // Assuming confirmed
            base_room_charge: 180.00 // Example base charge per night, adjust as needed
        }
    ];

    // Constants for fixed charges
    const AUTO_KEYS_CHARGE = 10.00;
    const CLUB_FACILITY_CHARGE = 25.00;

    // Global variable to store the currently selected reservation
    let currentReservation = null;
    let isLateCheckout = false;

    // Get DOM elements
    const reservationInput = document.getElementById('reservationInput');
    const searchCustomerBtn = document.getElementById('searchCustomerBtn');
    const searchMessage = document.getElementById('searchMessage');

    const reservationDetailsDiv = document.getElementById('reservationDetails');
    const customerName = document.getElementById('customerName');
    const customerNic = document.getElementById('customerNic');
    const customerPhone = document.getElementById('customerPhone');
    const customerEmail = document.getElementById('customerEmail');
    const hotelBranch = document.getElementById('hotelBranch');
    const totalGuests = document.getElementById('totalGuests');
    const checkInDate = document.getElementById('checkInDate');
    const checkOutDate = document.getElementById('checkOutDate');
    const reservationStatus = document.getElementById('reservationStatus');
    const lateCheckoutWarning = document.getElementById('lateCheckoutWarning');

    const optionalChargesSection = document.getElementById('optionalChargesSection');
    const restaurantChargesInput = document.getElementById('restaurantCharges');
    const roomServiceInput = document.getElementById('roomService');
    const laundryInput = document.getElementById('laundry');
    const telephoneServiceInput = document.getElementById('telephoneService');
    const autoKeysCheckbox = document.getElementById('autoKeys');
    const clubFacilityCheckbox = document.getElementById('clubFacility');
    const currentSubtotalSpan = document.getElementById('currentSubtotal');

    const paymentSection = document.getElementById('paymentSection');
    const paymentMethodRadios = document.querySelectorAll('input[name="paymentMethod"]');
    const creditCardDetailsDiv = document.getElementById('creditCardDetails');
    const cardNumberInput = document.getElementById('cardNumber');
    const cardExpirationInput = document.getElementById('cardExpiration');
    const cardCvvInput = document.getElementById('cardCvv');
    const paymentValidationMessage = document.getElementById('paymentValidationMessage');

    const checkoutSummaryDiv = document.getElementById('checkoutSummary');
    const totalAmountSpan = document.getElementById('totalAmount');
    const checkoutBtn = document.getElementById('checkoutBtn');

    const statementModal = document.getElementById('statementModal');
    const statementContent = document.getElementById('statementContent');
    const closeModalBtn = document.getElementById('closeModalBtn');

    // Function to load reservation details
    function loadReservationDetails() {
        const inputVal = reservationInput.value.trim();
        if (!inputVal) {
            searchMessage.textContent = 'Please enter a Reservation ID or NIC.';
            searchMessage.classList.remove('hidden');
            resetUI();
            return;
        }

        // Search mock data by ID or NIC
        const reservation = mockReservations.find(res =>
            res.id === inputVal || // Match by string ID
            res.nic.toLowerCase() === inputVal.toLowerCase()
        );

        if (reservation) {
            currentReservation = reservation;
            searchMessage.classList.add('hidden');
            reservationDetailsDiv.classList.remove('hidden');
            optionalChargesSection.classList.remove('hidden');
            paymentSection.classList.remove('hidden');
            checkoutSummaryDiv.classList.remove('hidden');

            // Populate reservation details
            customerName.textContent = reservation.name;
            customerNic.textContent = reservation.nic;
            customerPhone.textContent = reservation.phone;
            customerEmail.textContent = reservation.email;
            hotelBranch.textContent = reservation.hotel_branch;
            totalGuests.textContent = reservation.total_guests;
            checkInDate.textContent = reservation.check_in_date;
            checkOutDate.textContent = reservation.check_out_date;
            reservationStatus.textContent = reservation.status;

            // Check for late checkout
            const today = new Date();
            today.setHours(0, 0, 0, 0); // Normalize today's date to midnight
            const checkoutDate = new Date(reservation.check_out_date);
            checkoutDate.setHours(0, 0, 0, 0); // Normalize checkout date to midnight

            // If today is strictly after the checkout date, it's a late checkout.
            // Or if today is the checkout date, but after the checkout time (defaulting to midnight checkout), also late.
            // For simplicity, we compare dates only.
            if (today > checkoutDate) {
                isLateCheckout = true;
                lateCheckoutWarning.classList.remove('hidden');
            } else {
                isLateCheckout = false;
                lateCheckoutWarning.classList.add('hidden');
            }

            // Reset optional charges inputs and calculate total
            resetOptionalCharges();
            calculateTotal();

            // If credit card info exists in mock data, pre-fill and select credit card option
            if (reservation.card_number && reservation.card_expiration && reservation.card_cvv) {
                document.querySelector('input[name="paymentMethod"][value="creditCard"]').checked = true;
                creditCardDetailsDiv.classList.remove('hidden');
                cardNumberInput.value = reservation.card_number;
                cardExpirationInput.value = reservation.card_expiration;
                cardCvvInput.value = reservation.card_cvv;
            } else {
                // Default to cash if no card info, and hide credit card fields
                document.querySelector('input[name="paymentMethod"][value="cash"]').checked = true;
                creditCardDetailsDiv.classList.add('hidden');
                cardNumberInput.value = '';
                cardExpirationInput.value = '';
                cardCvvInput.value = '';
            }

        } else {
            searchMessage.textContent = 'No reservation found with that ID or NIC.';
            searchMessage.classList.remove('hidden');
            resetUI();
        }
    }

    // Function to reset all UI elements
    function resetUI() {
        currentReservation = null;
        isLateCheckout = false;
        reservationDetailsDiv.classList.add('hidden');
        optionalChargesSection.classList.add('hidden');
        paymentSection.classList.add('hidden');
        checkoutSummaryDiv.classList.add('hidden');
        lateCheckoutWarning.classList.add('hidden');
        paymentValidationMessage.classList.add('hidden');
        resetOptionalCharges();
        document.querySelector('input[name="paymentMethod"][value="cash"]').checked = true;
        creditCardDetailsDiv.classList.add('hidden');
        cardNumberInput.value = '';
        cardExpirationInput.value = '';
        cardCvvInput.value = '';
        totalAmountSpan.textContent = '0.00';
        currentSubtotalSpan.textContent = '0.00';
    }

    // Function to reset optional charges input fields
    function resetOptionalCharges() {
        restaurantChargesInput.value = '0';
        roomServiceInput.value = '0';
        laundryInput.value = '0';
        telephoneServiceInput.value = '0';
        autoKeysCheckbox.checked = false;
        clubFacilityCheckbox.checked = false;
    }

    // Function to calculate total amount
    function calculateTotal() {
        if (!currentReservation) {
            totalAmountSpan.textContent = '0.00';
            currentSubtotalSpan.textContent = '0.00';
            return;
        }

        let subtotal = 0;

        // Base room charges calculation based on stay duration
        const checkIn = new Date(currentReservation.check_in_date);
        const checkOut = new Date(currentReservation.check_out_date);
        const diffTime = Math.abs(checkOut.getTime() - checkIn.getTime()); // Use getTime() for millisecond difference
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // Calculate days, ensure at least 1 for same-day check-in/out
        const numberOfNights = Math.max(1, diffDays); // A minimum of 1 night charged if check-in and check-out are on the same day

        const baseStayCharge = currentReservation.base_room_charge * numberOfNights;
        subtotal += baseStayCharge;

        // Optional charges
        subtotal += parseFloat(restaurantChargesInput.value) || 0;
        subtotal += parseFloat(roomServiceInput.value) || 0;
        subtotal += parseFloat(laundryInput.value) || 0;
        subtotal += parseFloat(telephoneServiceInput.value) || 0;

        if (autoKeysCheckbox.checked) {
            subtotal += AUTO_KEYS_CHARGE;
        }
        if (clubFacilityCheckbox.checked) {
            subtotal += CLUB_FACILITY_CHARGE;
        }

        // Additional night charge for late checkout
        if (isLateCheckout) {
            subtotal += currentReservation.base_room_charge; // Charge for one additional night
        }

        currentSubtotalSpan.textContent = subtotal.toFixed(2);
        totalAmountSpan.textContent = subtotal.toFixed(2);
    }

    // Function to validate credit card details
    function validateCreditCard() {
        const cardNumber = cardNumberInput.value.replace(/\s/g, '');
        const cardExpiration = cardExpirationInput.value;
        const cardCvv = cardCvvInput.value;

        // Basic validation
        if (!cardNumber || !cardExpiration || !cardCvv) {
            paymentValidationMessage.textContent = 'All credit card fields are required.';
            paymentValidationMessage.classList.remove('hidden');
            return false;
        }
        if (!/^\d{13,19}$/.test(cardNumber)) {
            paymentValidationMessage.textContent = 'Invalid card number.';
            paymentValidationMessage.classList.remove('hidden');
            return false;
        }
        if (!/^(0[1-9]|1[0-2])\/?([0-9]{2})$/.test(cardExpiration)) {
            paymentValidationMessage.textContent = 'Invalid expiration date (MM/YY).';
            paymentValidationMessage.classList.remove('hidden');
            return false;
        }
        if (!/^\d{3,4}$/.test(cardCvv)) {
            paymentValidationMessage.textContent = 'Invalid CVV.';
            paymentValidationMessage.classList.remove('hidden');
            return false;
        }

        // More robust expiration date check (future date)
        const [expMonth, expYear] = cardExpiration.split('/').map(Number);
        const currentYear = new Date().getFullYear() % 100; // Get last two digits of current year
        const currentMonth = new Date().getMonth() + 1; // Month is 0-indexed

        if (expYear < currentYear || (expYear === currentYear && expMonth < currentMonth)) {
            paymentValidationMessage.textContent = 'Credit card has expired.';
            paymentValidationMessage.classList.remove('hidden');
            return false;
        }

        paymentValidationMessage.classList.add('hidden');
        return true;
    }

    // Function to generate and display the checkout statement
    function generateStatement() {
        if (!currentReservation) {
            return; // Should not happen if checkout button is enabled correctly
        }

        let statementHtml = `<h3 class="text-2xl font-bold mb-4 text-center">Plaza Hotel Checkout Statement</h3>`;
        statementHtml += `<p class="mb-2"><strong>Date of Statement:</strong> ${new Date().toLocaleDateString()}</p>`;
        statementHtml += `<p class="mb-4"><strong>Reservation ID:</strong> ${currentReservation.id}</p>`;

        statementHtml += `<div class="mb-4 p-4 border rounded-lg bg-blue-50">`;
        statementHtml += `<h4 class="text-xl font-semibold mb-2">Guest Information:</h4>`;
        statementHtml += `<p><strong>Name:</strong> ${currentReservation.name}</p>`;
        statementHtml += `<p><strong>NIC:</strong> ${currentReservation.nic}</p>`;
        statementHtml += `<p><strong>Email:</strong> ${currentReservation.email}</p>`;
        statementHtml += `<p><strong>Check-in:</strong> ${currentReservation.check_in_date}</p>`;
        statementHtml += `<p><strong>Check-out:</strong> ${currentReservation.check_out_date}</p>`;
        statementHtml += `</div>`;

        let chargesDetails = `<div class="mb-4 p-4 border rounded-lg bg-green-50">`;
        chargesDetails += `<h4 class="text-xl font-semibold mb-2">Charges Breakdown:</h4>`;

        // Base room charges calculation for statement
        const checkInStatement = new Date(currentReservation.check_in_date);
        const checkOutStatement = new Date(currentReservation.check_out_date);
        const diffTimeStatement = Math.abs(checkOutStatement.getTime() - checkInStatement.getTime());
        const diffDaysStatement = Math.ceil(diffTimeStatement / (1000 * 60 * 60 * 24));
        const numberOfNightsStatement = Math.max(1, diffDaysStatement);

        const baseStayChargeStatement = currentReservation.base_room_charge * numberOfNightsStatement;
        chargesDetails += `<p>Room Charges (${numberOfNightsStatement} Nights @ $${currentReservation.base_room_charge.toFixed(2)}/Night): <span class="float-right">$${baseStayChargeStatement.toFixed(2)}</span></p>`;


        let optionalChargesTotal = 0;
        const restaurant = parseFloat(restaurantChargesInput.value) || 0;
        const roomService = parseFloat(roomServiceInput.value) || 0;
        const laundry = parseFloat(laundryInput.value) || 0;
        const telephone = parseFloat(telephoneServiceInput.value) || 0;

        if (restaurant > 0) {
            chargesDetails += `<p>Restaurant Charges: <span class="float-right">$${restaurant.toFixed(2)}</span></p>`;
            optionalChargesTotal += restaurant;
        }
        if (roomService > 0) {
            chargesDetails += `<p>Room Service Charges: <span class="float-right">$${roomService.toFixed(2)}</span></p>`;
            optionalChargesTotal += roomService;
        }
        if (laundry > 0) {
            chargesDetails += `<p>Laundry Charges: <span class="float-right">$${laundry.toFixed(2)}</span></p>`;
            optionalChargesTotal += laundry;
        }
        if (telephone > 0) {
            chargesDetails += `<p>Telephone Service: <span class="float-right">$${telephone.toFixed(2)}</span></p>`;
            optionalChargesTotal += telephone;
        }
        if (autoKeysCheckbox.checked) {
            chargesDetails += `<p>Automatic Issuing of Keys: <span class="float-right">$${AUTO_KEYS_CHARGE.toFixed(2)}</span></p>`;
            optionalChargesTotal += AUTO_KEYS_CHARGE;
        }
        if (clubFacilityCheckbox.checked) {
            chargesDetails += `<p>Club Facility: <span class="float-right">$${CLUB_FACILITY_CHARGE.toFixed(2)}</span></p>`;
            optionalChargesTotal += CLUB_FACILITY_CHARGE;
        }

        if (isLateCheckout) {
            const lateCharge = currentReservation.base_room_charge;
            chargesDetails += `<p class="text-yellow-800 font-semibold">Additional Night Charge (Late Checkout): <span class="float-right">$${lateCharge.toFixed(2)}</span></p>`;
            optionalChargesTotal += lateCharge; // Add to total
        }

        chargesDetails += `<p class="mt-4 pt-4 border-t font-bold text-lg">Subtotal of Optional Charges: <span class="float-right">$${optionalChargesTotal.toFixed(2)}</span></p>`;
        chargesDetails += `</div>`;
        statementHtml += chargesDetails;

        const finalTotal = parseFloat(totalAmountSpan.textContent);
        statementHtml += `<p class="text-2xl font-bold text-right mt-6">Total Amount Due: <span class="text-purple-700">$${finalTotal.toFixed(2)}</span></p>`;

        const selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
        statementHtml += `<p class="text-lg text-right mt-2">Payment Method: <span class="font-semibold">${selectedPaymentMethod === 'cash' ? 'Cash' : 'Credit Card'}</span></p>`;

        if (selectedPaymentMethod === 'creditCard' && validateCreditCard()) {
            statementHtml += `<p class="text-sm text-right">Card Number: **** **** **** ${cardNumberInput.value.slice(-4)}</p>`;
        }

        statementContent.innerHTML = statementHtml;
        statementModal.classList.remove('hidden');
    }

    // Event Listeners
    searchCustomerBtn.addEventListener('click', loadReservationDetails);
    reservationInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            loadReservationDetails();
        }
    });

    // Add event listeners to all optional charge inputs/checkboxes
    [restaurantChargesInput, roomServiceInput, laundryInput, telephoneServiceInput, autoKeysCheckbox, clubFacilityCheckbox].forEach(element => {
        element.addEventListener('input', calculateTotal);
        element.addEventListener('change', calculateTotal); // For checkboxes
    });

    // Event listener for payment method radio buttons
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.value === 'creditCard') {
                creditCardDetailsDiv.classList.remove('hidden');
            } else {
                creditCardDetailsDiv.classList.add('hidden');
                paymentValidationMessage.classList.add('hidden'); // Clear validation message
            }
        });
    });

    // Event listener for checkout button
    checkoutBtn.addEventListener('click', () => {
        let isValid = true;
        if (document.querySelector('input[name="paymentMethod"]:checked').value === 'creditCard') {
            isValid = validateCreditCard();
        }

        if (isValid) {
            generateStatement();
            // In a real application, you would send this data to the backend for billing record creation
            console.log('Checkout processed for reservation:', currentReservation.id);
            console.log('Total Amount:', totalAmountSpan.textContent);
        } else {
            // Validation message already displayed by validateCreditCard()
            console.error('Payment validation failed.');
        }
    });

    // Close modal button
    closeModalBtn.addEventListener('click', () => {
        statementModal.classList.add('hidden');
    });

    // Close modal when clicking outside the content
    statementModal.addEventListener('click', (e) => {
        if (e.target === statementModal) {
            statementModal.classList.add('hidden');
        }
    });

    // Initial state: hide dynamic sections
    document.addEventListener('DOMContentLoaded', resetUI);

</script>

@endsection