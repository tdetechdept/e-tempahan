
 @php $count = 1; @endphp
 <div class="table-responsive eb-table-main">
                <table id="userMgmtTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr data-url="{{ route('users.show', $user->id) }}">
                                <th>{{ $count++ }}</th>
                                <td>{{ $user->name ?? '-' }}</td>
                                <td>{{ $user->section ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $statusLabels = [
                                            1 => 'New',
                                            2 => 'Pending',
                                            3 => 'Approved',
                                            4 => 'Rejected',
                                            5 => 'Cancelled',
                                        ];

                                        $statusText = $statusLabels[$user->status] ?? 'Unknown';
                                        $statusClass = 'eb-' . strtolower($statusText); // e.g., 'eb-approved'
                                    @endphp

                                    <span class="eb-status-tag {{ $statusClass }}">{{ $statusText }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
