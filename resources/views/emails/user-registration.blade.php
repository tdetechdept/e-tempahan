<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isSuccess ? 'Pendaftaran Berjaya' : 'Pendaftaran Tidak Berjaya' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: {{ $isSuccess ? '#28a745' : '#dc3545' }};
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
        .info-box {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $isSuccess ? 'Pendaftaran Berjaya' : 'Pendaftaran Tidak Berjaya' }}</h1>
        <p>Sistem Tempahan Bilik</p>
    </div>
    
    <div class="content">
        <p>Assalamualaikum dan Salam Sejahtera,</p>
        
        <p>Kepada <strong>{{ $user->name }}</strong>,</p>
        
        @if($isSuccess)
            <div class="success">
                <h3>🎉 Tahniah! Pendaftaran Anda Telah Berjaya</h3>
                <p>Akaun anda telah berjaya didaftarkan dalam Sistem Tempahan Bilik. Anda kini boleh mengakses sistem untuk membuat tempahan bilik.</p>
            </div>
            
            @if($password)
            <div class="info-box">
                <h4>Maklumat Log Masuk:</h4>
                <p><strong>Emel:</strong> {{ $user->email }}</p>
                <p><strong>Kata Laluan:</strong> {{ $password }}</p>
                <p><strong>URL Sistem:</strong> <a href="{{ url('/') }}">{{ url('/') }}</a></p>
            </div>
            
            <div class="info-box">
                <h4>⚠️ Penting:</h4>
                <ul>
                    <li>Gunakan kata laluan yang diberikan untuk log masuk kali pertama</li>
                    <li>Tukar kata laluan anda selepas log masuk</li>
                    <li>Jangan kongsi maklumat log masuk dengan sesiapa</li>
                </ul>
            </div>
            @else
            <div class="info-box">
                <h4>Maklumat Akaun:</h4>
                <p><strong>Emel:</strong> {{ $user->email }}</p>
                <p><strong>Status:</strong> Diluluskan</p>
                <p><strong>URL Sistem:</strong> <a href="{{ url('/') }}">{{ url('/') }}</a></p>
            </div>
            @endif
        @else
            <div class="error">
                <h3>❌ Pendaftaran Tidak Berjaya</h3>
                <p>Maaf, pendaftaran anda tidak dapat diproses pada masa ini. Sila cuba lagi atau hubungi pentadbir sistem untuk bantuan.</p>
            </div>
            
            <div class="info-box">
                <h4>Maklumat Pendaftaran:</h4>
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Emel:</strong> {{ $user->email }}</p>
                <p><strong>Status:</strong> Ditolak</p>
            </div>
        @endif
        
        <div class="info-box">
            <h4>📞 Bantuan Teknikal:</h4>
            <p>Jika anda menghadapi sebarang masalah, sila hubungi:</p>
            <ul>
                <li>Bahagian Pengurusan Maklumat (BPM)</li>
                <li>Emel: support@example.com</li>
                <li>Telefon: 03-1234 5678</li>
            </ul>
        </div>
        
        <p>Terima kasih,<br>
        <strong>Pentadbir Sistem Tempahan Bilik</strong></p>
    </div>
    
    <div class="footer">
        <p>Emel ini dihantar secara automatik oleh Sistem Tempahan Bilik.<br>
        Jangan balas emel ini kerana ia adalah emel sistem.</p>
    </div>
</body>
</html> 