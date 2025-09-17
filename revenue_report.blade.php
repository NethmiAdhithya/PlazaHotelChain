@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        {{-- Use asset() helper for images --}}
        <img src="{{ asset('images\blue.png') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>REVENUE REPORT</h1>
    </div>
</header><br><br><br><br><br><br><br>

<section class="report-filters-section">
    <div class="form-container">
        {{-- Assign an ID to the form so the bottom "Generate Report" button can target it --}}
        <form action="{{ route('revenue.report') }}" method="POST" id="revenue-report-form">
            @csrf {{-- CSRF token for security in Laravel forms --}}
            <div class="filter-group">
                <label for="date-from">Start Date</label>
                {{-- Use old() helper to retain input values after submission, or $variable for initial load --}}
                <input type="date" id="date-from" name="date_from" value="{{ old('date_from', $dateFrom ?? '') }}">
                <label for="date-to">End Date</label>
                <input type="date" id="date-to" name="date_to" value="{{ old('date_to', $dateTo ?? '') }}">
            </div>

            <div class="filter-group">
                <label for="report-type">Report Type</label>
                <select id="report-type" name="report_type">
                    <option value="">Select Report Type</option>
                    {{-- Dynamically set 'selected' based on old input or current variable --}}
                    <option value="daily" {{ (old('report_type', $reportType ?? '') == 'daily') ? 'selected' : '' }}>Daily</option>
                    <option value="weekly" {{ (old('report_type', $reportType ?? '') == 'weekly') ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ (old('report_type', $reportType ?? '') == 'monthly') ? 'selected' : '' }}>Monthly</option>
                    <option value="yearly" {{ (old('report_type', $reportType ?? '') == 'yearly') ? 'selected' : '' }}>Yearly</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="hotel-location">Hotel Location</label>
                <select id="hotel-location" name="hotel_location">
                    <option value="">All Locations</option>
                    <option value="plaza-colombo" {{ (old('hotel_location', $hotelLocation ?? '') == 'plaza-colombo') ? 'selected' : '' }}>Plaza Colombo</option>
                    <option value="plaza-kandy" {{ (old('hotel_location', $hotelLocation ?? '') == 'plaza-kandy') ? 'selected' : '' }}>Plaza Kandy</option>
                    <option value="plaza-galle" {{ (old('hotel_location', $hotelLocation ?? '') == 'plaza-galle') ? 'selected' : '' }}>Plaza Galle</option>
                    <option value="plaza-nuwaraeliya" {{ (old('hotel_location', $hotelLocation ?? '') == 'plaza-nuwaraeliya') ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
                    <option value="plaza-jaffna" {{ (old('hotel_location', $hotelLocation ?? '') == 'plaza-jaffna') ? 'selected' : '' }}>Plaza Jaffna</option>
                </select>
            </div>

            <div class="generate-report-container">
                <button type="submit" class="generate-report-btn-main">Generate Report</button>
            </div>
        </form>
    </div>
</section>

<section class="revenue-details-section">
    <div class="container">
        <div class="revenue-data-block">
            <h2>Room Revenue Details</h2>
            {{-- Conditionally display table if roomRevenueDetails array is not empty --}}
            @if (!empty($roomRevenueDetails))
            <table>
                <thead>
                    <tr>
                        <th>Period</th> {{-- Changed from Month to Period for generality (daily, weekly, monthly, yearly) --}}
                        <th>Booking Avg. Rate (LKR)</th>
                        <th>Revenue (LKR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomRevenueDetails as $row)
                        <tr>
                            <td>{{ $row['period'] }}</td>
                            <td>{{ $row['booking_avg_rate'] }}</td>
                            <td>{{ $row['revenue'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>No room revenue data for the selected filters and period.</p>
            @endif
            <p class="last-updated">Last updated: {{ $lastUpdated ?? 'N/A' }}</p>
        </div>
<br><br>
        <div class="revenue-data-block">
            <h2>Extra Services Revenue</h2>
            {{-- Conditionally display table if extraServicesRevenue array is not empty --}}
            @if (!empty($extraServicesRevenue))
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Revenue (LKR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($extraServicesRevenue as $row)
                        <tr>
                            <td>{{ $row['service'] }}</td>
                            <td>{{ $row['revenue'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>No extra services revenue data for the selected filters and period.</p>
            @endif
            <p class="last-updated">Last updated: {{ $lastUpdated ?? 'N/A' }}</p>
        </div>

        <div class="insights-box">
            <h3>Insights</h3>
            {{-- Conditionally display insights --}}
            @if (!empty($insights))
                <ul>
                    @foreach($insights as $insight)
                        {{-- Add class based on insight type for styling (e.g., green for success, red for danger) --}}
                        <li class="{{ $insight['type'] ?? '' }}">{{ $insight['text'] }}</li>
                    @endforeach
                </ul>
            @else
                <p>No insights generated for the current selection.</p>
            @endif
        </div>
    </div>
</section>

<section class="bottom-generate-report-section">
    <div class="container">
        {{-- This button now triggers the form submission using the form's ID --}}
        <button type="submit" form="revenue-report-form" class="generate-report-btn-bottom">Generate Report</button>
    </div>
</section>

<section class="export-print-buttons">
    <div class="container">
        <button class="export-btn export-pdf">Export as PDF</button>
        <button class="export-btn export-excel">Export as Excel</button>
        <button class="export-btn print-report">Print Report</button>
    </div>
</section>

@endsection
