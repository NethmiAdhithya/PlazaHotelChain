<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\CustomerRoomTypesController;
use App\Http\Controllers\CustomerBookResidentialSuiteController;
use App\Http\Controllers\CustomerMakeNewReservationController;
use App\Http\Controllers\CustomerViewChangeCancelReservationController;
use App\Http\Controllers\CustomerViewCheckoutController;
use App\Http\Controllers\CustomerViewBookingHistoryController;
use App\Http\Controllers\TravelCompanyDashboardController;
use App\Http\Controllers\TravelCompanyBookingController;
use App\Http\Controllers\TravelCompanyRoomTypesController;
use App\Http\Controllers\TravelCompanyViewCheckoutController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\OccupancyReportController;
use App\Http\Controllers\RevenueReportController;
use App\Http\Controllers\NoShowCustomerSummaryReportController;
use App\Http\Controllers\ClerkDashboardController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckOutController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/customer_dashboard', [CustomerDashboardController::class, 'index']);
Route::get('/customer_room_types', [CustomerRoomTypesController::class, 'index']);
Route::get('/customer_book_residential_suite', [CustomerBookResidentialSuiteController::class, 'index']);
Route::get('/customer_make_new_reservation', [CustomerMakeNewReservationController::class, 'index']);
Route::get('/customer_view_change_cancel_reservation', [CustomerViewChangeCancelReservationController::class, 'index']);
Route::get('/customer_view_checkout', [CustomerViewCheckoutController::class, 'index']);
Route::get('/customer_view_booking_history', [CustomerViewBookingHistoryController::class, 'index']);
Route::get('/travel_company_dashboard', [TravelCompanyDashboardController::class, 'index']);
Route::get('/travel_company_booking', [TravelCompanyBookingController::class, 'index']);
Route::get('/travel_company_room_types', [TravelCompanyRoomTypesController::class, 'index']);
Route::get('/travel_company_view_checkout', [TravelCompanyViewCheckoutController::class, 'index']);
Route::get('/manager_dashboard', [ManagerDashboardController::class, 'index']);
Route::get('/reports', [ReportsController::class, 'index']);
Route::get('/occupancy_report', [OccupancyReportController::class, 'index']);
Route::get('/revenue_report', [RevenueReportController::class, 'index']);
Route::get('/no-show_customer_summary_report', [NoShowCustomerSummaryReportController::class, 'index']);
Route::get('/clerk_dashboard', [ClerkDashboardController::class, 'index']);
Route::get('/check-in', [CheckInController::class, 'index']);
Route::get('/check-out', [CheckOutController::class, 'index']);



// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes (if needed)
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:manager,reservation_clerk']);
