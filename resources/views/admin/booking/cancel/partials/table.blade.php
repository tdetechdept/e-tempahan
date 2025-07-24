<div class="table-responsive eb-table-main">
    <table id="rezervationTable" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name / Ministry / Division</th>
                <th>Room Name</th>
                <th>Date / Time</th>
                <th>Apply Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($bookings as $index => $booking)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>{{ $booking->user->name ?? '-' }}</td>
                    <td>{{ $booking->room->room_name ?? 'N/A' }}</td>
                    <td>
                        <p>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</p>
                        <p>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</p>
                    </td>
                    <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                    <td>
                        @php
                            $statusLabels = [
                                1 => 'New',
                                2 => 'Pending',
                                3 => 'Approved',
                                4 => 'Rejected',
                                5 => 'Cancelled',
                            ];
                        @endphp
                        <span class="eb-status-tag eb-new">{{ strtoupper($statusLabels[$booking->status] ?? 'UNKNOWN') }}</span>
                    </td>
                    <td><a href="{{ route('booking.cancelled.show', $booking) }}" class="eb-view-eye-btn">See</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4 text-gray-500">No bookings found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

