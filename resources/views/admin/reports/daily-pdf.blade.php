<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tempahan Harian (PDF)</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h2 { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Laporan Tempahan Harian</h2>
    <p><strong>Tarikh:</strong> {{ $date }}</p>
    <p><strong>Status Permohonan:</strong> {{ $statusText }}</p>
    <p><strong>Jumlah Tempahan:</strong> {{ $totalBookings }}</p>
    <p><strong>Jumlah Masa Digunakan:</strong> {{ $totalHours }} jam</p>

    <table>
        <thead>
            <tr>
                <th>Bil</th>
                <th>Tarikh</th>
                <th>Nama Mesyuarat</th>
                <th>Bilik</th>
                <th>Masa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $i => $booking)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->meeting_name }}</td>
                    <td>{{ $booking->room->room_name }}</td>
                    <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
                    <td>{{ $booking->getStatusNameAttribute() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
