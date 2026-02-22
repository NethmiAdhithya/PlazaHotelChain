@extends('master')

@section('content')

<header class="hero-section">
        <div class="hero-image-container">
            <img src="images\room.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <div class="about-content">
            <h1>NO-SHOW CUSTOMER SUMMARY REPORT</h1>
        </div>
    </header><br><br><br><br><br><br><br><br><br>

<section class="report-controls-section">
            <div class="container">
                <div class="report-controls">
                    <div class="control-group">
                        <label for="fromDate">From Date: </label>
                        <input type="date" id="fromDate">
                    </div>
                    <div class="control-group">
                        <label for="toDate">To Date: </label>
                        <input type="date" id="toDate">
                    </div>
                    <div class="control-group">
                        <label for="hotelLocation">Hotel Location:</label>
                        <select id="hotelLocation">
                            <option value="all">All Locations</option>
                            <option value="location1">Location A</option>
                            <option value="location2">Location B</option>
                        </select>
                    </div>
                    <button class="btn-generate" id="generateSummaryButton">Generate Summary</button>
                </div>
            </div>
        </section>

        <section class="report-details-section">
            <div class="container">
                <h2>No-show Summary - Date-wise</h2>

                <div class="summary-key-metrics">
                    <p>Total Bookings: <span id="totalBookings">0</span></p>
                    <p>Total No-shows: <span id="totalNoShows">0</span></p>
                    <p>No-show Rate: <span id="noShowRate">0%</span></p>
                </div>

                <div class="chart-placeholder">
                    [Chart Placeholder - Line or Bar chart]
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Bookings</th>
                                <th>No-shows</th>
                                <th>No-show %</th>
                            </tr>
                        </thead>
                        <tbody id="noShowTableBody">
                            <tr>
                                <td>2025-06-01</td>
                                <td>40</td>
                                <td>5</td>
                                <td>12.5%</td>
                            </tr>
                            <tr>
                                <td>2025-06-02</td>
                                <td>45</td>
                                <td>5</td>
                                <td>11.1%</td>
                            </tr>
                            <tr>
                                <td>2025-06-03</td>
                                <td>31</td>
                                <td>9</td>
                                <td>29.0%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="report-actions">
                    <button class="btn-download">Download PDF</button>
                    <button class="btn-export">Export Excel</button>
                    <button class="btn-print">Print</button>
                </div>

                <div class="insights">
                    <h3>Insights:</h3>
                    <ul>
                        <li><i class="fas fa-chart-line"></i> Highest no-show recorded in 2025-06-03 (9 guests).</li>
                        <li><i class="fas fa-lightbulb"></i> Consider sending reminders or offering incentives to reduce no-shows.</li>
                    </ul>
                    <p class="last-updated" id="lastUpdated">Data last updated: 2025-06-08 12:46 AM</p>
                </div>

                <button class="btn-generate-bottom" id="generateSummaryButtonBottom">Generate Report</button>
            </div>
        </section>

<script>
        document.addEventListener('DOMContentLoaded', () => {
    const fromDateInput = document.getElementById('fromDate');
    const toDateInput = document.getElementById('toDate');
    const hotelLocationSelect = document.getElementById('hotelLocation');
    const generateButton = document.getElementById('generateSummaryButton');
    const generateButtonBottom = document.getElementById('generateSummaryButtonBottom');

    const totalBookingsSpan = document.getElementById('totalBookings');
    const totalNoShowsSpan = document.getElementById('totalNoShows');
    const noShowRateSpan = document.getElementById('noShowRate');
    const noShowTableBody = document.getElementById('noShowTableBody');
    const lastUpdatedP = document.getElementById('lastUpdated');

    // Set default dates for current month up to today
    const today = new Date();
    const firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);

    const format = (date) => {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0');
        const day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    fromDateInput.value = format(firstDayOfMonth);
    toDateInput.value = format(today);

    // Initial placeholder data (from the image)
    const initialTableData = [
        { date: "2025-06-01", bookings: 40, no_shows: 5, no_show_percentage: 12.5 },
        { date: "2025-06-02", bookings: 45, no_shows: 5, no_show_percentage: 11.1 },
        { date: "2025-06-03", bookings: 31, no_shows: 9, no_show_percentage: 29.0 },
    ];

    const initialTotalBookings = initialTableData.reduce((sum, row) => sum + row.bookings, 0);
    const initialTotalNoShows = initialTableData.reduce((sum, row) => sum + row.no_shows, 0);
    const initialNoShowRate = (initialTotalBookings > 0) ? ((initialTotalNoShows / initialTotalBookings) * 100).toFixed(2) : 0;


    const renderTable = (data) => {
        noShowTableBody.innerHTML = ''; // Clear existing rows
        data.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${row.date}</td>
                <td>${row.bookings}</td>
                <td>${row.no_shows}</td>
                <td>${row.no_show_percentage}%</td>
            `;
            noShowTableBody.appendChild(tr);
        });
    };

    const updateMetrics = (totalBookings, totalNoShows, noShowRate) => {
        totalBookingsSpan.textContent = totalBookings;
        totalNoShowsSpan.textContent = totalNoShows;
        noShowRateSpan.textContent = `${noShowRate}%`;
        lastUpdatedP.textContent = `Data last updated: ${new Date().toLocaleString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true, year: 'numeric', month: '2-digit', day: '2-digit' })}`;
    };

    // Render initial data on page load
    renderTable(initialTableData);
    updateMetrics(initialTotalBookings, initialTotalNoShows, initialNoShowRate);


    const fetchNoShowReport = async () => {
        const fromDate = fromDateInput.value;
        const toDate = toDateInput.value;
        const hotelLocation = hotelLocationSelect.value;

        console.log('Fetching No-show Report with:', { fromDate, toDate, hotelLocation });

        // --- IMPORTANT: This is where you would connect to your backend API ---
        // For this ONLY HTML/CSS/JS version, we'll simulate data.
        // If integrating with Laravel:
        /*
        try {
            const response = await fetch('/api/no-show-report', { // Laravel API endpoint
                method: 'POST', // Use POST for sending data
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // For Laravel CSRF protection
                },
                body: JSON.stringify({
                    from_date: fromDate,
                    to_date: toDate,
                    hotel_location: hotelLocation
                })
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            console.log('Backend Report Data:', data);

            updateMetrics(data.totalBookings, data.totalNoShows, data.noShowRate);
            renderTable(data.dailyReports);

            // You would also update your chart here (e.g., Chart.js)
            // updateNoShowChart(data.chartData);

        } catch (error) {
            console.error('Error fetching no-show report:', error);
            alert('Failed to generate report. Please try again. (Check console for details)');
        }
        */

        // --- SIMULATED DATA FOR FRONTEND ONLY DEMO ---
        // Replace this with actual backend fetch logic when integrating
        const simulatedData = generateSimulatedNoShowData(fromDate, toDate);
        const currentTotalBookings = simulatedData.reduce((sum, row) => sum + row.bookings, 0);
        const currentTotalNoShows = simulatedData.reduce((sum, row) => sum + row.no_shows, 0);
        const currentNoShowRate = (currentTotalBookings > 0) ? ((currentTotalNoShows / currentTotalBookings) * 100).toFixed(2) : 0;

        updateMetrics(currentTotalBookings, currentTotalNoShows, currentNoShowRate);
        renderTable(simulatedData);
        alert('Report generated! (Simulated data)');
    };

    // Helper to generate simulated data for a date range
    function generateSimulatedNoShowData(startDateStr, endDateStr) {
        const startDate = new Date(startDateStr);
        const endDate = new Date(endDateStr);
        const data = [];
        let currentDate = startDate;

        while (currentDate <= endDate) {
            const bookings = Math.floor(Math.random() * 20) + 30; // 30-50 bookings
            const noShows = Math.floor(Math.random() * (bookings * 0.2)) + 1; // 1-20% no-shows
            const noShowPercentage = ((noShows / bookings) * 100).toFixed(1);

            data.push({
                date: format(currentDate),
                bookings: bookings,
                no_shows: noShows,
                no_show_percentage: parseFloat(noShowPercentage),
            });
            currentDate.setDate(currentDate.getDate() + 1);
        }
        return data;
    }


    generateButton.addEventListener('click', fetchNoShowReport);
    generateButtonBottom.addEventListener('click', fetchNoShowReport);

    // Placeholder for download/export/print functionality
    document.querySelector('.btn-download').addEventListener('click', () => alert('Download PDF clicked! (Requires backend)'));
    document.querySelector('.btn-export').addEventListener('click', () => alert('Export Excel clicked! (Requires backend)'));
    document.querySelector('.btn-print').addEventListener('click', () => window.print());
});
    </script>

@endsection