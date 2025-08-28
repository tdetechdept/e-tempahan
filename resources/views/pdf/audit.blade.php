<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title>Maklumat Butiran Log</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #333;
        }
        h2 {
            background: #f5f5f5;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .info-table, .changes-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 6px 10px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        .changes-table th, .changes-table td {
            border: 1px solid #ddd;
            padding: 6px 10px;
            text-align: left;
        }
        .changes-table th {
            background: #f5f5f5;
        }
        .status {
            display: inline-block;
            padding: 3px 8px;
            background: #1a73e8;
            color: #fff;
            border-radius: 4px;
            font-size: 11px;
        }
    </style>
</head>
<body>
    <h2>Maklumat Butiran Log</h2>
    <table class="info-table">
        <tr>
            <td><strong>Nama Pegawai</strong></td>
            <td>{{$audit->user->name ?? 'Unknown'}}</td>
        </tr>
        <tr>
            <td><strong>Tarikh & Masa</strong></td>
            <td>{{ $audit->created_at->format('d F Y, h:i A') }}</td>
        </tr>
        <tr>
            <td><strong>Emel Pengguna</strong></td>
            <td>{{$audit->user->email ?? 'N/A'}}</td>
        </tr>
        <tr>
            <td><strong>Peranan</strong></td>
            <td>{{ $audit->user->role ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Bahagian</strong></td>
            <td>{{ $audit->user->department ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Tindakan Dilakukan</strong></td>
            <td>{{ ucfirst($audit->event) }} {{ str_replace('App\Models\\', '', $audit->auditable_type) }}</td>
        </tr>
        <tr>
            <td><strong>Status</strong></td>
            <td><span class="status">BERJAYA</span></td>
        </tr>
        <tr>
            <td><strong>Alamat IP</strong></td>
            <td>{{ $audit->ip_address ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>Peranti / Pelayar</strong></td>
            <td>{{ $audit->user_agent ? 'Browser: ' . substr($audit->user_agent, 0, 50) . '...' : 'N/A' }}</td>
        </tr>
        <tr>
            <td><strong>URL Akses</strong></td>
            <td>{{ $audit->url ?? 'N/A' }}</td>
        </tr>
    </table>

    @if($audit->old_values || $audit->new_values)
    <h2>Maklumat Perubahan</h2>
    <table class="changes-table">
        <thead>
            <tr>
                <th>BIL.</th>
                <th>PERUBAHAN</th>
                <th>SEBELUM</th>
                <th>SELEPAS</th>
            </tr>
        </thead>
        <tbody>
             @php
                $oldValues = is_array($audit->old_values) 
                    ? $audit->old_values 
                    : ($audit->old_values ? json_decode($audit->old_values, true) : []);

                $newValues = is_array($audit->new_values) 
                    ? $audit->new_values 
                    : ($audit->new_values ? json_decode($audit->new_values, true) : []);
                
                $changes = array_merge($oldValues, $newValues);
                $changes = array_unique(array_keys($changes));
            @endphp
            @foreach($changes as $index => $field)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ ucfirst(str_replace('_', ' ', $field)) }}</td>
                    <td>{{ $oldValues[$field] ?? 'N/A' }}</td>
                    <td>{{ $newValues[$field] ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</body>
</html>