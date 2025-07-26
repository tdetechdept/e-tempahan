@php $count = 1; @endphp
@foreach ($users as $user)
    @php
        $statusText = $statusLabels[$user->status] ?? 'Unknown';
      @endphp
    <tr data-url="{{ route('users.show', $user->id) }}" data-status="{{ strtolower($statusText) }}">
        <td>{{ $count++ }}</td>
        <td>{{ $user->name ?? '-' }}</td>
        <td>{{ $user->section ?? 'N/A' }}</td>
        <td>
            @php
                $statusStyles = [
                    0 => [
                        'label' => 'BAHARU',
                        'bg' => '#fff3cd',
                        'text' => '#856404',
                    ],
                    1 => [
                        'label' => 'AkTIF',
                        'bg' => '#d4edda',
                        'text' => '#155724',
                    ],
                    2 => [
                        'label' => 'DILULUSKAN',
                        'bg' => '#cce5ff',
                        'text' => '#004085',
                    ],
                    3 => [
                        'label' => 'DITOLAK',
                        'bg' => '#f8d7da',
                        'text' => '#721c24',
                    ],
                    4 => [
                        'label' => 'DIBATALKAN',
                        'bg' => '#e2e3e5',
                        'text' => '#383d41',
                    ],
                    5 => [
                        'label' => 'NYAHAKTIF',
                        'bg' => '#fefefe',
                        'text' => '#6c757d',
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
@endforeach
</tbody>