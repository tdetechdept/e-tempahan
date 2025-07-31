@extends('layouts.super_admin.app')

@section('content')
    <div class="content-wrapper">
        <div class="dashboard-card">
            <div class="card-intro">
                <h2>Selamat Datang ke sistem eTempahan</h2>
                <p>Urus dan pantau semua tempahan dengan mudah dan berkesan</p>
            </div>

            <div class="card-metrics">
                <div class="metric-box">
                    <div class="metric_content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M7 3.25a.75.75 0 0 1 .75.75v1.668a48 48 0 0 1 8.5 0V4a.75.75 0 0 1 1.5 0v1.816a3.375 3.375 0 0 1 2.872 2.899l.087.653c.364 2.746.332 5.53-.094 8.268a3.01 3.01 0 0 1-2.678 2.532l-1.193.118a48.4 48.4 0 0 1-9.488 0l-1.193-.118a3.01 3.01 0 0 1-2.678-2.532a29 29 0 0 1-.094-8.268l.087-.653A3.375 3.375 0 0 1 6.25 5.816V4A.75.75 0 0 1 7 3.25m.445 3.953c3.03-.299 6.08-.299 9.11 0l.905.09c.867.085 1.56.756 1.675 1.619l.087.653q.045.342.082.685H4.696q.037-.343.082-.685l.087-.653a1.875 1.875 0 0 1 1.675-1.62zM4.577 11.75a27.5 27.5 0 0 0 .29 5.655a1.51 1.51 0 0 0 1.343 1.27l1.193.118c3.057.302 6.137.302 9.194 0l1.193-.118a1.51 1.51 0 0 0 1.343-1.27c.292-1.872.388-3.767.29-5.655z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="metric-label">Total Tempahan</p>
                        <p class="metric-value">{{ $totalBookings ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="metric-box">
                    <div class="metric_content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M7 3.25a.75.75 0 0 1 .75.75v1.668a48 48 0 0 1 8.5 0V4a.75.75 0 0 1 1.5 0v1.816a3.375 3.375 0 0 1 2.872 2.899l.087.653c.364 2.746.332 5.53-.094 8.268a3.01 3.01 0 0 1-2.678 2.532l-1.193.118a48.4 48.4 0 0 1-9.488 0l-1.193-.118a3.01 3.01 0 0 1-2.678-2.532a29 29 0 0 1-.094-8.268l.087-.653A3.375 3.375 0 0 1 6.25 5.816V4A.75.75 0 0 1 7 3.25m.445 3.953c3.03-.299 6.08-.299 9.11 0l.905.09c.867.085 1.56.756 1.675 1.619l.087.653q.045.342.082.685H4.696q.037-.343.082-.685l.087-.653a1.875 1.875 0 0 1 1.675-1.62zM4.577 11.75a27.5 27.5 0 0 0 .29 5.655a1.51 1.51 0 0 0 1.343 1.27l1.193.118c3.057.302 6.137.302 9.194 0l1.193-.118a1.51 1.51 0 0 0 1.343-1.27c.292-1.872.388-3.767.29-5.655z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="metric-label">Total Pengguna</p>
                        <p class="metric-value">{{ $totalUsers ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="metric-box">
                    <div class="metric_content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M7 3.25a.75.75 0 0 1 .75.75v1.668a48 48 0 0 1 8.5 0V4a.75.75 0 0 1 1.5 0v1.816a3.375 3.375 0 0 1 2.872 2.899l.087.653c.364 2.746.332 5.53-.094 8.268a3.01 3.01 0 0 1-2.678 2.532l-1.193.118a48.4 48.4 0 0 1-9.488 0l-1.193-.118a3.01 3.01 0 0 1-2.678-2.532a29 29 0 0 1-.094-8.268l.087-.653A3.375 3.375 0 0 1 6.25 5.816V4A.75.75 0 0 1 7 3.25m.445 3.953c3.03-.299 6.08-.299 9.11 0l.905.09c.867.085 1.56.756 1.675 1.619l.087.653q.045.342.082.685H4.696q.037-.343.082-.685l.087-.653a1.875 1.875 0 0 1 1.675-1.62zM4.577 11.75a27.5 27.5 0 0 0 .29 5.655a1.51 1.51 0 0 0 1.343 1.27l1.193.118c3.057.302 6.137.302 9.194 0l1.193-.118a1.51 1.51 0 0 0 1.343-1.27c.292-1.872.388-3.767.29-5.655z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="metric-label">Total Bilik</p>
                        <p class="metric-value">{{ $totalRooms ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="calender_section">
            <div class="calendar1-container">
                <header class="calendar1-header">
                    <div class="calender-align-header">
                        <p class="calendar1-current-date">July 2025</p>
                    </div>
                    <div class="calendar1-navigation calender-align-header">
                        <span id="calendar1-prev" class="material-symbols-rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="m14 7l-5 5l5 5" />
                            </svg>
                        </span>
                        <span id="calendar1-next" class="material-symbols-rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9.31 6.71a.996.996 0 0 0 0 1.41L13.19 12l-3.88 3.88a.996.996 0 1 0 1.41 1.41l4.59-4.59a.996.996 0 0 0 0-1.41L10.72 6.7c-.38-.38-1.02-.38-1.41.01" />
                            </svg>
                        </span>
                    </div>
                </header>

                <div class="calendar1-body">
                    <ul class="calendar1-weekdays">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="calendar1-dates">
                        <!-- Populated by JS -->
                    </ul>
                </div>

                <div class="calendar1-events" id="calendar1-events-list">
                    <!-- Event list will be rendered here by JS -->
                </div>
            </div>
        </div>
    </div>

    <div class="table-section">
        <h4>Senarai Pengguna</h4>
        <div class="dropdown-section">
            <div>
                <p>Senarai</p>
                <select name="status" id="status">
                    <option value="semua">Semua</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak_aktif">Tidak Aktif</option>
                </select>
            </div>
            <a href="{{ route('users.index') }}">Lihat Semua</a>
        </div>
        <div class="table-container">
            @if(isset($users) && $users->count() > 0)
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Tarikh / Masa</th>
                            <th>Tarikh Mohon</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr class="user-row" data-status="{{ $user->status }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @php
                                        $statusStyles = [
                                            0 => [
                                                'label' => 'BAHARU',
                                                'class' => 'BAHARU',
                                            ],
                                            1 => [
                                                'label' => 'AKTIF',
                                                'class' => 'AKTIF',
                                            ],
                                            2 => [
                                                'label' => 'DILULUSKAN',
                                                'class' => 'DILULUSKAN',
                                            ],
                                            3 => [
                                                'label' => 'DITOLAK',
                                                'class' => 'DITOLAK',
                                            ],
                                            4 => [
                                                'label' => 'DIBATALKAN',
                                                'class' => 'DIBATALKAN',
                                            ],
                                            5 => [
                                                'label' => 'NYAHAKTIF',
                                                'class' => 'NYAHAKTIF',
                                            ],
                                        ];

                                        $status = $statusStyles[$user->status] ?? [
                                            'label' => 'TIDAK DIKETAHUI',
                                            'class' => 'TIDAK_DIKETAHUI',
                                        ];
                                    @endphp

                                    <span class="badge {{ $status['class'] }}">{{ $status['label'] }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" style="text-decoration: none;">
                                        <p class="btn-view">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                                                <path fill="currentColor" d="M515.472 321.408c-106.032 0-192 85.968-192 192c0 106.016 85.968 192 192 192s192-85.968 192-192s-85.968-192-192-192m0 320c-70.576 0-129.473-58.816-129.473-129.393s57.424-128 128-128c70.592 0 128 57.424 128 128s-55.935 129.393-126.527 129.393m508.208-136.832c-.368-1.616-.207-3.325-.688-4.91c-.208-.671-.624-1.055-.864-1.647c-.336-.912-.256-1.984-.72-2.864c-93.072-213.104-293.663-335.76-507.423-335.76S95.617 281.827 2.497 494.947c-.4.897-.336 1.824-.657 2.849c-.223.624-.687.975-.895 1.567c-.496 1.616-.304 3.296-.608 4.928c-.591 2.88-1.135 5.68-1.135 8.592c0 2.944.544 5.664 1.135 8.591c.32 1.6.113 3.344.609 4.88c.208.72.672 1.024.895 1.68c.336.88.256 1.968.656 2.848c93.136 213.056 295.744 333.712 509.504 333.712c213.776 0 416.336-120.4 509.44-333.505c.464-.912.369-1.872.72-2.88c.224-.56.655-.976.848-1.6c.496-1.568.336-3.28.687-4.912c.56-2.864 1.088-5.664 1.088-8.624c0-2.816-.528-5.6-1.104-8.497M512 800.595c-181.296 0-359.743-95.568-447.423-287.681c86.848-191.472 267.68-289.504 449.424-289.504c181.68 0 358.496 98.144 445.376 289.712C872.561 704.53 693.744 800.595 512 800.595" />
                                            </svg> Lihat
                                        </p>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="no-data-container" style="text-align: center; padding: 40px 20px; background: #f8f9fa; border-radius: 8px; margin: 20px 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#6c757d" stroke-width="1" style="margin-bottom: 16px;">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <h5 style="color: #6c757d; margin-bottom: 8px;">Tiada Data Dijumpai</h5>
                    <p style="color: #6c757d; margin: 0;">Tiada pengguna ditemui dalam sistem pada masa ini.</p>
                </div>
            @endif
        </div>
    </div>

    @push('js')
    <script>
        // Pass holidays data from PHP to JavaScript (should contain ALL holidays for all months)
        window.holidaysData = @json($specialHolidays ?? []);

        function renderEventListForMonth(month, year) {
            const eventListContainer = document.getElementById('calendar1-events-list');
            if (!eventListContainer) return;

            console.log('renderEventListForMonth called with month:', month, 'year:', year);
            console.log('window.holidaysData:', window.holidaysData);

            // Filter holidays for the selected month and year - include events that span across the month
            const monthEvents = window.holidaysData.filter(event => {
                const startDate = new Date(event.start_date);
                const endDate = new Date(event.end_date);
                const monthStart = new Date(year, month, 1);
                const monthEnd = new Date(year, month + 1, 0);
                
                console.log('Checking event:', event.holiday_name, 'start:', startDate, 'end:', endDate, 'monthStart:', monthStart, 'monthEnd:', monthEnd);
                
                // Check if the event overlaps with the current month
                const overlaps = (startDate <= monthEnd && endDate >= monthStart);
                console.log('Overlaps:', overlaps);
                return overlaps;
            });

            console.log('Filtered monthEvents:', monthEvents);

            // Sort by date
            monthEvents.sort((a, b) => new Date(a.start_date) - new Date(b.start_date));

            // Build HTML
            let html = '';
            if (monthEvents.length === 0) {
                html = '<p><strong><span class="dot"></span> Tiada cuti khas untuk bulan ini</strong></p>';
            } else {
                monthEvents.forEach(event => {
                    const startDate = new Date(event.start_date);
                    const endDate = new Date(event.end_date);
                    
                    // Format date range
                    let dateStr;
                    if (startDate.getTime() === endDate.getTime()) {
                        // Single day event
                        dateStr = startDate.toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
                    } else {
                        // Multi-day event
                        const startStr = startDate.toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
                        const endStr = endDate.toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
                        dateStr = `${startStr} - ${endStr}`;
                    }
                    
                    html += `<p><strong><span class="dot"></span> ${dateStr} : ${event.holiday_name}</strong></p>`;
                });
            }
            eventListContainer.innerHTML = html;
        }

        // Render for the current month on page load
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            renderEventListForMonth(today.getMonth(), today.getFullYear());
        });
        // You must call renderEventListForMonth(newMonth, newYear) whenever the calendar month changes!
    </script>
    @endpush
@endsection
