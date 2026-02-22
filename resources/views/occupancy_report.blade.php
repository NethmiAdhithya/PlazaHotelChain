@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>OCCUPANCY REPORT</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="report-filters-section">
            <div class="form-container">
                <form action="#" method="POST">
                    <div class="filter-group">
                        <label for="date-from">Date Range</label>
                        <input type="date" id="date-from" name="date_from">
                        <label for="date-to">To</label>
                        <input type="date" id="date-to" name="date_to">
                    </div>

                    <div class="filter-group">
                        <label for="location">Location</label>
                        <select id="location" name="location">
                            <option value="">Select Location</option>
                            <option value="plaza-colombo">Plaza Colombo</option>
                            <option value="plaza-kandy">Plaza Kandy</option>
                            <option value="plaza-galle">Plaza Galle</option>
                            <option value="plaza-nuwaraeliya">Plaza Nuwara Eliya</option>
                            <option value="plaza-jaffna">Plaza Jaffna</option>
                        </select>
                    </div>

                    <div class="filter-group report-type-group">
                        <label for="report-type">Report Type</label>
                        <div class="report-type-options">
                            <button type="button" class="report-type-btn active" data-report-type="daily">Daily</button>
                            <button type="button" class="report-type-btn" data-report-type="weekly">Weekly</button>
                            <button type="button" class="report-type-btn" data-report-type="monthly">Monthly</button>
                        </div>
                    </div>

                    <div class="filter-group">
                        <label for="room-type">Rooms Type</label>
                        <select id="room-type" name="room_type">
                            <option value="">Select Room Type</option>
                            <option value="deluxe">Deluxe</option>
                            <option value="suite">Suite</option>
                            <option value="family">Family</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="triple">Triple</option>
                        </select>
                    </div>

                    <div class="filter-buttons">
                        <button type="reset" class="reset-filters-btn">Reset Filters</button>
                        <button type="submit" class="generate-report-btn">Generate Report</button>
                    </div>
                </form>
            </div>
        </section>

        <section class="report-summary-section">
            <div class="container">
                <div class="summary-item">
                    <h4>Total Rooms</h4>
                    <p>120</p>
                    <p class="change no-change">= No change</p>
                </div>
                <div class="summary-item">
                    <h4>Rooms Occupied</h4>
                    <p>90</p>
                    <p class="change increase">▲ 3% increase</p>
                </div>
                <div class="summary-item">
                    <h4>Rooms Vacant</h4>
                    <p>30</p>
                    <p class="change decrease">▼ 5% decrease</p>
                </div>
                <div class="summary-item">
                    <h4>Occupancy Rate</h4>
                    <p>75%</p>
                    <p class="change increase">▲ 3% increase</p>
                </div>
                <div class="summary-item">
                    <h4>Total Revenue</h4>
                    <p>LKR 1,200,000</p>
                    <p class="change increase">▲ 5% increase</p>
                </div>
            </div>
        </section>

        <section class="occupancy-trend-section">
            <div class="container">
                <h2>Occupancy Trend (June 1-7, 2025)</h2>
                <button class="trend-btn">Per Day</button>
                <div class="chart-placeholder">
                    </div>
            </div>
        </section>

        <section class="detailed-occupancy-data">
            <div class="container">
                <h2>Detailed Occupancy Data</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Room Occupied</th>
                            <th>Room Vacant</th>
                            <th>Occupancy Rate</th>
                            <th>Revenue (LKR)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-06-01 (Sun)</td>
                            <td>88</td>
                            <td>32</td>
                            <td>73%</td>
                            <td>1,150,000</td>
                        </tr>
                        <tr>
                            <td>2025-06-02 (Mon)</td>
                            <td>87</td>
                            <td>33</td>
                            <td>72%</td>
                            <td>1,120,000</td>
                        </tr>
                        <tr>
                            <td>2025-06-03 (Tue)</td>
                            <td>90</td>
                            <td>30</td>
                            <td>75%</td>
                            <td>1,200,000</td>
                        </tr>
                        <tr>
                            <td>2025-06-04 (Wed)</td>
                            <td>92</td>
                            <td>28</td>
                            <td>77%</td>
                            <td>1,250,000</td>
                        </tr>
                        <tr>
                            <td>2025-06-05 (Thu)</td>
                            <td>96</td>
                            <td>24</td>
                            <td>80%</td>
                            <td>1,330,000</td>
                        </tr>
                        <tr>
                            <td>2025-06-06 (Fri)</td>
                            <td>90</td>
                            <td>30</td>
                            <td>75%</td>
                            <td>1,220,000</td>
                        </tr>
                        <tr>
                            <td>2025-06-07 (Sat)</td>
                            <td>90</td>
                            <td>30</td>
                            <td>75%</td>
                            <td>1,260,000</td>
                        </tr>
                        <tr class="table-average">
                            <td>Average</td>
                            <td>90</td>
                            <td>30</td>
                            <td>75%</td>
                            <td>1,211,428</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="insights-recommendations">
            <div class="container">
                <h2>Insights & Recommendations</h2>
                <button class="generate-insights-btn">
                    <img src="lightbulb-icon.png" alt="Lightbulb Icon"> Generate Insights
                </button>

                <div class="insight-item">
                    <h3><img src="chart-icon.png" alt="Chart Icon"> Occupancy Trend Analysis</h3>
                    <p>Occupancy has increased by 5% compared to last week, with weekends showing the highest occupancy rates (85% on Saturday). Weekdays average 73-79% occupancy.</p>
                </div>

                <div class="insight-item">
                    <h3><img src="calendar-icon.png" alt="Calendar Icon"> Booking Patterns</h3>
                    <p>Most bookings occur 3-7 days in advance for weekdays, while weekend bookings are made 1-2 weeks in advance. Consider offering early-bird discounts for weekday stays.</p>
                </div>

                <div class="insight-item">
                    <h3><img src="money-icon.png" alt="Money Icon"> Revenue Opportunities</h3>
                    <p>Wednesday and Thursday show lower occupancy (72-77%). Implement mid-week promotions targeting business travelers to fill these gaps.</p>
                </div>

                <div class="export-buttons">
                    <button class="export-btn export-pdf">Export as PDF</button>
                    <button class="export-btn export-excel">Export as Excel</button>
                    <button class="export-btn print-report">Print Report</button>
                </div>
            </div>
        </section>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const reportTypeBtns = document.querySelectorAll('.report-type-btn');

            reportTypeBtns.forEach(button => {
                button.addEventListener('click', () => {
                    reportTypeBtns.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    // In a real application, this would trigger logic to fetch data based on the selected type
                    console.log('Report Type selected:', button.dataset.reportType);
                });
            });
        });
    </script>

@endsection