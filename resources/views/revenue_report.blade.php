@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>REVENUE REPORT</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="report-filters-section">
            <div class="form-container">
                <form action="#" method="POST">
                    <div class="filter-group">
                        <label for="date-from">Start Date</label>
                        <input type="date" id="date-from" name="date_from">
                        <label for="date-to">End Date</label>
                        <input type="date" id="date-to" name="date_to">
                    </div>

                    <div class="filter-group">
                        <label for="report-type">Report Type</label>
                        <select id="report-type" name="report_type">
                            <option value="">Select Report Type</option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="hotel-location">Hotel Location</label>
                        <select id="hotel-location" name="hotel_location">
                            <option value="">All Locations</option>
                            <option value="plaza-colombo">Plaza Colombo</option>
                            <option value="plaza-kandy">Plaza Kandy</option>
                            <option value="plaza-galle">Plaza Galle</option>
                            <option value="plaza-nuwaraeliya">Plaza Nuwara Eliya</option>
                            <option value="plaza-jaffna">Plaza Jaffna</option>
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
                    <table>
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Booking Avg. Rate (LKR)</th>
                                <th>Revenue (LKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2025-06-01 to 06-07</td>
                                <td>10,000</td>
                                <td>750,000</td>
                            </tr>
                            <tr>
                                <td>2025-05-25 to 05-31</td>
                                <td>9,800</td>
                                <td>700,000</td>
                            </tr>
                            </tbody>
                    </table>
                    <p class="last-updated">Last updated: 2025-06-02 07:00 PM</p>
                </div>

                <div class="revenue-data-block">
                    <h2>Extra Services Revenue</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Revenue (LKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2025-06-01 (Restaurant)</td>
                                <td>15,000</td>
                            </tr>
                            <tr>
                                <td>2025-06-01 (Laundry)</td>
                                <td>5,000</td>
                            </tr>
                            <tr>
                                <td>2025-06-01 (Club Facility)</td>
                                <td>10,000</td>
                            </tr>
                            </tbody>
                    </table>
                    <p class="last-updated">Last updated: 2025-06-02 07:00 PM</p>
                </div>

                <div class="insights-box">
                    <h3>Insights</h3>
                    <ul>
                        <li>Extra service revenue contributes 20% of total revenue this week.</li>
                        <li>Room revenue increased by 7% compared to last month.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="bottom-generate-report-section">
            <div class="container">
                <button type="submit" class="generate-report-btn-bottom">Generate Report</button>
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