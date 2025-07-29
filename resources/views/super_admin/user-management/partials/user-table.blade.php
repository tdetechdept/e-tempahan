@forelse($users as $index => $user)
    <tr>
        <td>{{ $users->firstItem() + $index }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @switch($user->status)
                @case(0)
                    <span class="badge BAHARU">BAHARU</span>
                    @break
                @case(1)
                    <span class="badge PENDING">PENDING</span>
                    @break
                @case(2)
                    <span class="badge AKTIF">AKTIF</span>
                    @break
                @case(3)
                    <span class="badge DITOLAK">DITOLAK</span>
                    @break
                @case(4)
                    <span class="badge DIBATALKAN">DIBATALKAN</span>
                    @break
                @case(5)
                    <span class="badge NYAHAKTIF">NYAHAKTIF</span>
                    @break
                @default
                    <span class="badge UNKNOWN">UNKNOWN</span>
            @endswitch
        </td>
      
         <td>
            <a href="{{ route('users.show', $user->id) }}"
                class="gap-2 btn btn-sm btn-outline-custom d-flex align-items-center eye-btn">
                <span class="material-symbols-rounded">visibility</span>
                Lihat
            </a>
       </td>

    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center py-4">
            <i class="fas fa-users fa-2x text-muted mb-2"></i>
            <p class="text-muted">Tiada pengguna ditemui</p>
        </td>
    </tr>
@endforelse