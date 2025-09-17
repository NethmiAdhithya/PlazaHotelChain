@extends('master')

@section('content')

<header class="hero-section">
    <div class="hero-image-container">
        <img src="{{ asset('images\blue.png') }}" alt="Plaza Hotel" class="hero-image">
    </div>
    <div class="about-content">
        <h1>OCCUPANCY REPORT</h1>
    </div>
</header><br><br><br><br><br><br><br>

<section class="report-filters-section">
    <div class="form-container">
        <form action="{{ route('occupancy.report') }}" method="POST">
            @csrf {{-- CSRF token for security --}}
            <div class="filter-group">
                <label for="date-from">Date Range</label>
                <input type="date" id="date-from" name="date_from" value="{{ old('date_from', $dateFrom ?? '') }}">
                <label for="date-to">To</label>
                <input type="date" id="date-to" name="date_to" value="{{ old('date_to', $dateTo ?? '') }}">
            </div>

            <div class="filter-group">
                <label for="location">Location</label>
                <select id="location" name="location">
                    <option value="">Select Location</option>
                    <option value="plaza-colombo" {{ (old('location', $location ?? '') == 'plaza-colombo') ? 'selected' : '' }}>Plaza Colombo</option>
                    <option value="plaza-kandy" {{ (old('location', $location ?? '') == 'plaza-kandy') ? 'selected' : '' }}>Plaza Kandy</option>
                    <option value="plaza-galle" {{ (old('location', $location ?? '') == 'plaza-galle') ? 'selected' : '' }}>Plaza Galle</option>
                    <option value="plaza-nuwaraeliya" {{ (old('location', $location ?? '') == 'plaza-nuwaraeliya') ? 'selected' : '' }}>Plaza Nuwara Eliya</option>
                    <option value="plaza-jaffna" {{ (old('location', $location ?? '') == 'plaza-jaffna') ? 'selected' : '' }}>Plaza Jaffna</option>
                </select>
            </div>

            <div class="filter-group report-type-group">
                <label for="report-type">Report Type</label>
                <div class="report-type-options">
                    <button type="button" class="report-type-btn {{ (old('report_type', $reportType ?? 'daily') == 'daily') ? 'active' : '' }}" data-report-type="daily">Daily</button>
                    <button type="button" class="report-type-btn {{ (old('report_type', $reportType ?? 'daily') == 'weekly') ? 'active' : '' }}" data-report-type="weekly">Weekly</button>
                    <button type="button" class="report-type-btn {{ (old('report_type', $reportType ?? 'daily') == 'monthly') ? 'active' : '' }}" data-report-type="monthly">Monthly</button>
                    <input type="hidden" name="report_type" id="hidden-report-type" value="{{ old('report_type', $reportType ?? 'daily') }}">
                </div>
            </div>

            <div class="filter-group">
                <label for="room-type">Rooms Type</label>
                <select id="room-type" name="room_type">
                    <option value="">Select Room Type</option>
                    <option value="deluxe" {{ (old('room_type', $roomType ?? '') == 'deluxe') ? 'selected' : '' }}>Deluxe</option>
                    <option value="suite" {{ (old('room_type', $roomType ?? '') == 'suite') ? 'selected' : '' }}>Suite</option>
                    <option value="family" {{ (old('room_type', $roomType ?? '') == 'family') ? 'selected' : '' }}>Family</option>
                    <option value="single" {{ (old('room_type', $roomType ?? '') == 'single') ? 'selected' : '' }}>Single</option>
                    <option value="double" {{ (old('room_type', $roomType ?? '') == 'double') ? 'selected' : '' }}>Double</option>
                    <option value="triple" {{ (old('room_type', $roomType ?? '') == 'triple') ? 'selected' : '' }}>Triple</option>
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
            <p>{{ $summaryData['total_rooms'] ?? 'N/A' }}</p>
            <p class="change no-change">= No change</p> {{-- This would need more complex backend logic for dynamic change calculation --}}
        </div>
        <div class="summary-item">
            <h4>Rooms Occupied</h4>
            <p>{{ $summaryData['rooms_occupied'] ?? 'N/A' }}</p>
            <p class="change increase">▲ 3% increase</p> {{-- Placeholder, needs dynamic calculation --}}
        </div>
        <div class="summary-item">
            <h4>Rooms Vacant</h4>
            <p>{{ $summaryData['rooms_vacant'] ?? 'N/A' }}</p>
            <p class="change decrease">▼ 5% decrease</p> {{-- Placeholder, needs dynamic calculation --}}
        </div>
        <div class="summary-item">
            <h4>Occupancy Rate</h4>
            <p>{{ $summaryData['occupancy_rate'] ?? '0%' }}</p>
            <p class="change increase">▲ 3% increase</p> {{-- Placeholder, needs dynamic calculation --}}
        </div>
        <div class="summary-item">
            <h4>Total Revenue</h4>
            <p>LKR {{ $summaryData['total_revenue'] ?? '0.00' }}</p>
            <p class="change increase">▲ 5% increase</p> {{-- Placeholder, needs dynamic calculation --}}
        </div>
    </div>
</section>

@if (!empty($detailedData))
<section class="occupancy-trend-section">
    <div class="container">
        <h2>Occupancy Trend ({{ $dateFrom ? Carbon\Carbon::parse($dateFrom)->format('M j') : 'Start Date' }} - {{ $dateTo ? Carbon\Carbon::parse($dateTo)->format('M j, Y') : 'End Date' }})</h2>
        <button class="trend-btn">Per Day</button>
        <div class="chart-placeholder">
            {{-- This is where a chart (e.g., using Chart.js) would be rendered --}}
            {{-- You would pass $detailedData to a JavaScript library to draw the chart --}}
            <canvas id="occupancyChart"></canvas>
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
                @foreach ($detailedData as $data)
                    <tr @if($data['date'] == 'Average') class="table-average" @endif>
                        <td>{{ $data['date'] }}</td>
                        <td>{{ $data['rooms_occupied'] }}</td>
                        <td>{{ $data['rooms_vacant'] }}</td>
                        <td>{{ $data['occupancy_rate'] }}</td>
                        <td>{{ $data['revenue'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endif

<section class="insights-recommendations">
    <div class="container">
        <h2>Insights & Recommendations</h2>
        <button class="generate-insights-btn">
            <img src="{{ asset('images/lightbulb-icon.png') }}" alt="Lightbulb Icon"> Generate Insights
        </button>

        @if (!empty($insights))
            @foreach($insights as $insight)
                <div class="insight-item">
                    <h3><img src="{{ asset('images/' . $insight['icon']) }}" alt="Icon"> {{ $insight['title'] }}</h3>
                    <p>{{ $insight['description'] }}</p>
                </div>
            @endforeach
        @else
            <p>No insights generated for the current selection.</p>
        @endif

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
        const hiddenReportTypeInput = document.getElementById('hidden-report-type');

        reportTypeBtns.forEach(button => {
            button.addEventListener('click', () => {
                reportTypeBtns.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                hiddenReportTypeInput.value = button.dataset.reportType; // Set the hidden input value
                console.log('Report Type selected:', button.dataset.reportType);
            });
        });

        // Initialize button active state based on hidden input value on page load
        const initialReportType = hiddenReportTypeInput.value;
        const initialActiveButton = document.querySelector(`.report-type-btn[data-report-type="${initialReportType}"]`);
        if (initialActiveButton) {
            initialActiveButton.classList.add('active');
        }

        // --- Chart.js Integration (Example) ---
        // Only load if detailedData is available
        const detailedData = @json($detailedData ?? []); // <--- POTENTIAL ISSUE HERE
        if (detailedData.length > 0) {
            // Remove the 'Average' row for charting purposes
            const chartData = detailedData.filter(row => row.date !== 'Average');

            const dates = chartData.map(row => row.date);
            const occupiedRooms = chartData.map(row => row.rooms_occupied);
            const occupancyRates = chartData.map(row => parseFloat(row.occupancy_rate.replace('%', '')));
            const revenues = chartData.map(row => parseFloat(row.revenue.replace(/,/g, ''))); // Remove commas

            const ctx = document.getElementById('occupancyChart');
            if (ctx) { // Check if canvas element exists
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dates,
                        datasets: [
                            {
                                label: 'Rooms Occupied',
                                data: occupiedRooms,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1,
                                fill: false,
                                yAxisID: 'y'
                            },
                            {
                                label: 'Occupancy Rate (%)',
                                data: occupancyRates,
                                borderColor: 'rgb(255, 99, 132)',
                                tension: 0.1,
                                fill: false,
                                yAxisID: 'y1'
                            },
                            // You can add revenue to the chart if desired, but might need a separate axis or different chart type
                            // {
                            //     label: 'Revenue (LKR)',
                            //     data: revenues,
                            //     borderColor: 'rgb(54, 162, 235)',
                            //     tension: 0.1,
                            //     fill: false,
                            //     yAxisID: 'y2'
                            // }
                        ]
                    },
                    options: {
                        responsive: true,
                        interaction: {
                            mode: 'index',
                            intersect: false
                        },
                        scales: {
                            y: {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                title: {
                                    display: true,
                                    text: 'Rooms'
                                }
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                grid: {
                                    drawOnChartArea: false, // only draw grid lines for the first dataset
                                },
                                title: {
                                    display: true,
                                    text: 'Occupancy Rate (%)'
                                }
                            }
                            // Add y2 if you include revenue on the chart
                        }
                    }
                });
            }
        }
    });
</script>
{{-- Include Chart.js library --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection