<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No-show Summary - Plaza Hotel Chain</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body>
    <!-- header -->
    <header class="hero-section">
        <div class="hero-image-container">
            <img src="img/check out.jpg" alt="Plaza Hotel" class="hero-image">
        </div>
        <nav class="navbar">
            <div class="container">
                <div class="logo">Plaza</div>
                <ul class="nav-links">
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="report.html">REPORTS</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
                    <li><a href="register.html">REGISTER</a></li>
                </ul>
            </div>
        </nav>
        <div class="hero-content">
            <h1>NO SHOW SUMMARY REPORT</h1>
        </div>
    </header>

    <main>


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
    </main>

    <!-- footer -->
    <footer>
        <div class="container footer-grid">
            <div class="footer-col contact-info">
                <h4>CONTACT INFO</h4>
                <p>Plaza Hotel Chain,<br>125 Galle Road, Colombo 03,<br>Western Province, Sri Lanka</p>
                <p>+94 (11) 234-5678</p>
                <p>info@plazahotel.lk</p>
            </div>
            <div class="footer-col quick-links">
                <h4>QUICK LINKS</h4>
                <ul>
                    <li><a href="#">Rooms & Suites</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                    <li><a href="#">Gallery</a></li>
                </ul>
            </div>
            <div class="footer-col newsletter">
                <h4>NEWSLETTER</h4>
                <p>Stay updated with our latest offers.</p>
                <form>
                    <input type="email" placeholder="Your email address">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
            <div class="footer-col social-media">
                <h4>FOLLOW US</h4>
                <div class="social-icons">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                        </svg>
                    </a>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2025 Plaza. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

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

    const initialTableData = [
        { date: "2025-06-01", bookings: 40, no_shows: 5, no_show_percentage: 12.5 },
        { date: "2025-06-02", bookings: 45, no_shows: 5, no_show_percentage: 11.1 },
        { date: "2025-06-03", bookings: 31, no_shows: 9, no_show_percentage: 29.0 },
    ];

    const initialTotalBookings = initialTableData.reduce((sum, row) => sum + row.bookings, 0);
    const initialTotalNoShows = initialTableData.reduce((sum, row) => sum + row.no_shows, 0);
    const initialNoShowRate = (initialTotalBookings > 0) ? ((initialTotalNoShows / initialTotalBookings) * 100).toFixed(2) : 0;


    const renderTable = (data) => {
        noShowTableBody.innerHTML = ''; 
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

    renderTable(initialTableData);
    updateMetrics(initialTotalBookings, initialTotalNoShows, initialNoShowRate);

    const fetchNoShowReport = async () => {
        const fromDate = fromDateInput.value;
        const toDate = toDateInput.value;
        const hotelLocation = hotelLocationSelect.value;

        console.log('Fetching No-show Report with:', { fromDate, toDate, hotelLocation });
        
        const simulatedData = generateSimulatedNoShowData(fromDate, toDate);
        const currentTotalBookings = simulatedData.reduce((sum, row) => sum + row.bookings, 0);
        const currentTotalNoShows = simulatedData.reduce((sum, row) => sum + row.no_shows, 0);
        const currentNoShowRate = (currentTotalBookings > 0) ? ((currentTotalNoShows / currentTotalBookings) * 100).toFixed(2) : 0;

        updateMetrics(currentTotalBookings, currentTotalNoShows, currentNoShowRate);
        renderTable(simulatedData);
        alert('Report generated! (Simulated data)');
    };

    function generateSimulatedNoShowData(startDateStr, endDateStr) {
        const startDate = new Date(startDateStr);
        const endDate = new Date(endDateStr);
        const data = [];
        let currentDate = startDate;

        while (currentDate <= endDate) {
            const bookings = Math.floor(Math.random() * 20) + 30; 
            const noShows = Math.floor(Math.random() * (bookings * 0.2)) + 1; 
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

    document.querySelector('.btn-download').addEventListener('click', () => alert('Download PDF clicked! (Requires backend)'));
    document.querySelector('.btn-export').addEventListener('click', () => alert('Export Excel clicked! (Requires backend)'));
    document.querySelector('.btn-print').addEventListener('click', () => window.print());
});
    </script>

</body>
</html>