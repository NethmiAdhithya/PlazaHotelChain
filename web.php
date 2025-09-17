<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookResidentialSuiteController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerRoomTypesController;
use App\Http\Controllers\CustomerViewCheckOutController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MakeReservationController;
use App\Http\Controllers\OccupancyReportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\RevenueReportController;
use App\Http\Controllers\TravelCompanyBookingController;
use App\Http\Controllers\TravelCompanyRoomTypesController;
use App\Http\Controllers\TravelCompanyViewCheckOutController;
use App\Http\Controllers\ViewBookingHistoryController;
use App\Http\Controllers\ViewChangeCancelReservationController;
use App\Http\Controllers\ClerkReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

// --- PUBLIC ROUTES ---
// Routes accessible to anyone (not logged in)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Customer & Travel Company Registration Routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Password Reset Routes (accessible to guests, so they are outside 'auth' middleware)
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// General Room Types Page (Assuming this is public and accessible without login)
Route::get('/customer-room-types', [CustomerRoomTypesController::class, 'index'])->name('customer_room_types.index');


// --- AUTHENTICATED ROUTES ---
// These routes require any user to be logged in ('auth' middleware)
Route::middleware(['auth'])->group(function () {

    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // --- DASHBOARD ROUTES (Role-specific) ---
    // These routes require the user to be logged in AND have a specific role
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->middleware('role:customer')->name('customer.dashboard');

    Route::get('/clerk/dashboard', function () {
        return view('clerk.dashboard');
    })->middleware('role:clerk')->name('clerk.dashboard');

    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->middleware('role:manager')->name('manager.dashboard');

    Route::get('/travel-company/dashboard', function () {
        return view('travel-company.dashboard'); // Changed to match your folder name
    })->middleware('role:travel_company')->name('travel-company.dashboard');


    // --- CUSTOMER SPECIFIC ROUTES ---
    Route::middleware('role:customer')->group(function () {
        Route::get('/book-residential-suite', [BookResidentialSuiteController::class, 'create'])->name('book-residential-suite.create');
        Route::post('/book-residential-suite', [BookResidentialSuiteController::class, 'store'])->name('book-residential-suite.store');
        
        Route::get('/make_new_reservation', [MakeReservationController::class, 'create'])->name('make_new_reservation.create');
        Route::post('/make_new_reservation', [MakeReservationController::class, 'store'])->name('make_new_reservation.store');

        Route::get('/view_change_cancel_reservation', [ViewChangeCancelReservationController::class, 'index'])->name('view_change_cancel_reservation.index');
        Route::put('/view_change_cancel_reservation/{id}/cancel', [ViewChangeCancelReservationController::class, 'cancel'])->name('view_change_cancel_reservation.cancel');
        Route::get('/view_change_cancel_reservation/{type}/{id}/edit', [ViewChangeCancelReservationController::class, 'edit'])->name('view_change_cancel_reservation.edit');
        Route::put('/view_change_cancel_reservation/{type}/{id}', [ViewChangeCancelReservationController::class, 'update'])->name('view_change_cancel_reservation.update');

        Route::get('/view_booking_history_C', [ViewBookingHistoryController::class, 'index'])->name('customer.booking_history');
        Route::get('/customer-view-checkout', [CustomerViewCheckOutController::class, 'index'])->name('customer_view_checkout.index'); 
    });


    // --- TRAVEL COMPANY SPECIFIC ROUTES ---
    Route::middleware('role:travel_company')->group(function () {
        Route::get('/travel-company-room-types', [TravelCompanyRoomTypesController::class, 'index'])->name('travel_company_room_types.index');
        Route::get('/travel-company-booking', [TravelCompanyBookingController::class, 'create'])->name('travel_company_booking.create');
        Route::post('/travel-company-booking', [TravelCompanyBookingController::class, 'store'])->name('travel_company_booking.store');
        Route::get('/travel-company-view-checkout', [TravelCompanyViewCheckOutController::class, 'index'])->name('travel_company_view_checkout.index'); 
    });


    // --- CLERK SPECIFIC ROUTES ---
Route::middleware('role:clerk')->group(function () {

        // CHECK-OUT ROUTES FOR CLERK - THIS IS THE SECTION YOU NEED TO ENSURE IS CORRECT
        Route::get('/check-out', [CheckOutController::class, 'index'])->name('check_out.index');
        Route::get('/check-out/find', [CheckOutController::class, 'findReservation'])->name('checkout.find'); // <-- THIS IS THE MISSING ROUTE
        Route::post('/check-out/process', [CheckOutController::class, 'processCheckout'])->name('checkout.process');
    });


    // --- MANAGER SPECIFIC ROUTES ---
    Route::middleware('role:manager')->group(function () {
        Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
        Route::get('/occupancy-report', [OccupancyReportController::class, 'index'])->name('occupancy_report.index'); 
        Route::get('/revenue-report', [RevenueReportController::class, 'index'])->name('revenue_report.index'); 
    });

}); // End of the main 'auth' middleware group




// Check-in routes
Route::get('/check-in', [CheckInController::class, 'index'])->name('check_in.index');
Route::post('/check-in/find', [CheckInController::class, 'findReservation'])->name('check_in.find');
Route::post('/check-in/process', [CheckInController::class, 'processCheckIn'])->name('check_in.process');
Route::post('/check-in/update-checkout', [CheckInController::class, 'updateCheckoutDate'])->name('check_in.update_checkout');

// Route for getting available rooms (AJAX endpoint)
Route::get('/get-available-rooms', [CheckInController::class, 'getAvailableRooms'])->name('get.available.rooms');


// Example route for a view/change/cancel reservation page
Route::get('/view_change_cancel_reservation_C', function () {
    return "This is the view/change/cancel reservation page for customers.";
})->name('view_change_cancel_reservation_C');



// Clerk Reservation Management Routes
Route::middleware(['auth', 'can:access-clerk-panel'])->group(function () { // Example middleware for clerk access
    Route::get('/clerk/reservations', [ClerkReservationController::class, 'index'])->name('clerk.reservations.index');
    Route::get('/clerk/reservations/{reservation}/edit', [ClerkReservationController::class, 'edit'])->name('clerk.reservations.edit');
    Route::put('/clerk/reservations/{reservation}', [ClerkReservationController::class, 'update'])->name('clerk.reservations.update');
    Route::post('/clerk/reservations/{reservation}/cancel', [ClerkReservationController::class, 'cancel'])->name('clerk.reservations.cancel');
    Route::delete('/clerk/reservations/{reservation}', [ClerkReservationController::class, 'destroy'])->name('clerk.reservations.destroy'); // Use with caution
});




Route::prefix('checkout')->group(function () {
    // Route to display the checkout form (GET request)
    Route::get('/', [CheckOutController::class, 'index'])->name('checkout.index');

    // AJAX endpoint to find check-in details (POST request for data retrieval)
    // It's good practice to use POST for operations that fetch sensitive data or could have side effects,
    // though GET can also be used if idempotent and no sensitive query parameters.
    Route::post('/find', [CheckOutController::class, 'findCheckIn'])->name('checkout.find');

    // Endpoint to process the actual checkout (POST request for submitting the form)
    Route::post('/process', [CheckOutController::class, 'processCheckout'])->name('checkout.process');

    // Route to display the billing statement (GET request, requires billing ID)
    Route::get('/statement/{billing}', [CheckOutController::class, 'showStatement'])->name('checkout.statement');
});




Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');


// And if you haven't already, define your main reports index route
Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');


// Route for displaying the occupancy report form and results
Route::match(['get', 'post'], '/occupancy-report', [OccupancyReportController::class, 'index'])->name('occupancy.report');

// If you want a separate route just for the initial form display (without results)
// Route::get('/occupancy-report', [OccupancyReportController::class, 'showForm'])->name('occupancy.report.form');



Route::match(['get', 'post'], '/revenue-report', [RevenueReportController::class, 'index'])->name('revenue.report');



Route::get('/rooms/available', [RoomController::class, 'showAvailableRooms'])->name('rooms.available');


     
