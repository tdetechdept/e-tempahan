@php $count = 1; @endphp

        <tbody>
           
            @forelse ($users as $user)
             @php
             $statusText = $statusLabels[$user->status] ?? 'Unknown';
              @endphp
                <tr data-url="{{ route('users.show', $user->id) }}"  data-status="{{ strtolower($statusText) }}">
                    <td>{{ $count++ }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->section ?? 'N/A' }}</td>
                    <td>
                        @php
                            $statusStyles = [
                                0 => [
                                    'label' => 'Baharu',
                                    'bg' => '#fff3cd',
                                    'text' => '#856404',
                                ],
                                1 => [
                                    'label' => 'Tertangguh',
                                    'bg' => '#f8d7da',
                                    'text' => '#721c24',
                                ],
                                2 => [
                                    'label' => 'Diluluskan',
                                    'bg' => '#cce5ff',
                                    'text' => '#004085',
                                ],
                                3 => [
                                    'label' => 'Ditolak',
                                    'bg' => '#f5c6cb',
                                    'text' => '#721c24',
                                ],
                                4 => [
                                    'label' => 'Dibatalkan',
                                    'bg' => '#e2e3e5',
                                    'text' => '#383d41',
                                ],
                            ];

                            $status = $statusStyles[$user->status] ?? [
                                'label' => 'Unknown',
                                'bg' => '#f8f9fa',
                                'text' => '#6c757d',
                            ];
                        @endphp

                        <span class="badge d-block text-center w-100 py-2 rounded-4"
                            style="background-color: {{ $status['bg'] }}; color: {{ $status['text'] }};">
                            {{ $status['label'] }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Tiada pengguna ditemui.</td>
                </tr>
            @endforelse
        </tbody>
    