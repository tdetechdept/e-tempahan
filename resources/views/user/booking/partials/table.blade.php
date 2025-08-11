
            @foreach ($bookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->user->name ?? '-' }}</td>
                    <td>{{ $booking->room->room_name ?? 'N/A' }}</td>
                    <td>
                        <p>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</p>
                        <p>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</p>
                    </td>
                    <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                    <td>
                        @php
                            $statusStyles = [
                                1 => [
                                    'label' => 'BAHARU',
                                    'class' => 'eb-new',
                                    'bg' => '#fff3cd',
                                    'text' => '#856404',
                                ],
                                2 => [
                                    'label' => 'MENUNGGU PENGESAHAN',
                                    'class' => 'eb-pending',
                                    'bg' => '#d1ecf1',
                                    'text' => '#0c5460',
                                ],
                                3 => [
                                    'label' => 'DILULUSKAN',
                                    'class' => 'eb-approved',
                                    'bg' => '#d4edda',
                                    'text' => '#155724',
                                ],
                                4 => [
                                    'label' => 'DITOLAK',
                                    'class' => 'eb-rejected',
                                    'bg' => '#f8d7da',
                                    'text' => '#721c24',
                                ],
                                5 => [
                                    'label' => 'DIBATALKAN',
                                    'class' => 'eb-rejected',
                                    'bg' => '#f8d7da',
                                    'text' => '#721c24',
                                ],

                                6 => [ // updated by User
                                    'label' => 'KEMASKINI',
                                    'class' => 'eb-pending',
                                    'bg' => '#fff3cd',
                                    'text' => '#856404',
                                ],
                                    7 => [ // Confirmed by User
                                    'label' => 'DISAHKAN',
                                    'class' => 'eb-approved',
                                    'bg' => '#d4edda',
                                    'text' => '#155724',
                                ],
                            ];

                            $status = $statusStyles[$booking->status] ?? [
                                'label' => 'UNKNOWN',
                                'class' => 'eb-unknown',
                                'bg' => '#f8f9fa',
                                'text' => '#6c757d',
                            ];
                        @endphp
                        <span
                            class="eb-status-tag {{ $status['class'] }} text-uppercase px-3 py-1 rounded-3 small d-inline-block text-center"
                            style="background-color: {{ $status['bg'] }}; color: {{ $status['text'] }};">
                            {{ $status['label'] }}
                        </span>
                    </td>
                    <td><a href="{{ route('user.booking.show', $booking) }}" class="eb-view-eye-btn">Lihat</a></td>
                </tr>
          
            @endforeach
   
