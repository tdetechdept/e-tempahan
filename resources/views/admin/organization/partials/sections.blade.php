<div class="table-responsive eb-table-main">
    <table class="table table-hover organization-datatable">
        <thead>
            <tr>
                <th>Bil.</th>
                <th>Nama Bahagian</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ strtoupper($item->name) }}</td>
                    <td>
                        <a href="#" class="btn btn-sm rounded-circle"
                            style="background-color: #fff3cd; color: #856404; border: 1px solid #856404;" title="Kemaskini">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm rounded-circle"
                                style="background-color: #f8d7da; color: #721c24; border: 1px solid #721c24;" title="Padam"
                                onclick="return confirm('Padam entri ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
