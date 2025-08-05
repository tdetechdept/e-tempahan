<div class="table-responsive eb-table-main mb-4">
    <table id="{{ $tableId }}" class="table table-hover">
        <thead>
            <tr>
                <th>Bil.</th>
                @if ($routePrefix === 'chairman')
                    <th>Nama</th>
                    <th>Jawatan</th>
                    <th>Bahagian</th>
                    <th>Telefon Pejabat</th>
                @else
                    <th>{{ $type }}</th>
                @endif
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if ($routePrefix === 'chairman')
                        <td>{{ strtoupper($item->name) }}</td>
                        <td>{{ $item->position ?? '-' }}</td>
                        <td>{{ $item->division ?? '-' }}</td>
                        <td>{{ $item->office_phone ?? '-' }}</td>
                    @else
                        <td>{{ strtoupper($item->name) }}</td>
                    @endif
                    <td>
                        <a href="{{ route('organization.edit', ['type' => $routePrefix, 'id' => $item->id]) }}"
                            class="btn btn-sm rounded-circle"
                            style="background-color: #fff3cd; color: #856404; border: 1px solid #856404;" title="Kemaskini">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <!-- Delete Form -->
                        <button type="button"
                            class="btn btn-sm rounded-circle btn-delete"
                            data-id="{{ $item->id }}"
                            data-type="{{ $routePrefix }}"
                            data-name="{{ $item->name }}"
                            style="background-color: #f8d7da; color: #721c24; border: 1px solid #721c24;"
                            title="Padam">
                            <i class="bi bi-trash"></i>
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Custom Delete Modal -->
    <div class="modal fade eb-delete-popup" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" id="dynamicDeleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="eb-delete-icon mb-3"></div>
                        <h3>Adakah anda pasti?</h3>
                        <p id="delete-message">Adakah anda pasti mahu memadam entri ini?</p>
                        <div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>