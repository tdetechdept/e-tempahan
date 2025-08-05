@php $count = 1; @endphp
@foreach ($users as $user)
    <tr data-url="{{ route('users.show', $user->id) }}"
        data-status="{{ strtolower($statusLabels[$user->status] ?? 'unknown') }}">
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
        <td class="text-center">
            <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
                <!-- View Button -->
                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm rounded-circle"
                    style="background-color: #cce5ff; color: #004085; border: 1px solid #004085;" title="Lihat">
                    <i class="bi bi-eye"></i>
                </a>

                <!-- Edit Button -->
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm rounded-circle"
                    style="background-color: #fff3cd; color: #856404; border: 1px solid #856404;" title="Kemaskini">
                    <i class="bi bi-pencil"></i>
                </a>

                <!-- Delete Button -->
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm rounded-circle btn-delete-user" data-toggle="modal"
                        data-target="#deleteUserModal" data-url="{{ route('admin.users.destroy', $user->id) }}"
                        data-name="{{ $user->name }}" title="Padam"
                        style="background-color: #f8d7da; color: #721c24; border: 1px solid #721c24;">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>

                <!-- Approve Button or Empty Space -->
                @if ($user->status == 1 || $user->status == 2)
                    <a href="#" class="btn btn-sm rounded-circle"
                        style="background-color: #d4edda; color: #155724; border: 1px solid #155724;" title="Luluskan">
                        <i class="bi bi-check2"></i>
                    </a>
                @else
                    <span class="btn btn-sm rounded-circle invisible"
                        style="background-color: #d4edda; color: #155724; border: 1px solid #155724;">
                        <i class="bi bi-check2"></i>
                    </span>
                @endif
            </div>
        </td>
    </tr>
@endforeach
</tbody>
