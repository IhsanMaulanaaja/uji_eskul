<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            margin: -20px -20px 20px -20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px 0;
        }
        .success-message {
            background-color: #d1fae5;
            border-left: 4px solid #10b981;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #065f46;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .section-content {
            background-color: #f9fafb;
            padding: 12px;
            border-left: 4px solid #3b82f6;
            border-radius: 4px;
            word-wrap: break-word;
        }
        .footer {
            border-top: 1px solid #e5e7eb;
            padding-top: 15px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✓ Pesan Terkirim</h1>
        </div>
        
        <div class="content">
            <div class="success-message">
                <strong>Terima kasih {{ $nama }}!</strong><br>
                Kami telah menerima pesan Anda dengan baik. Tim kami akan merespon secepatnya.
            </div>

            <p>Berikut adalah ringkasan pesan yang Anda kirim:</p>

            <div class="section">
                <div class="section-title">Nama</div>
                <div class="section-content">
                    {{ $nama }}
                </div>
            </div>

            <div class="section">
                <div class="section-title">Pesan Anda</div>
                <div class="section-content">
                    {!! nl2br(e($pesan)) !!}
                </div>
            </div>

            <p style="margin-top: 30px; font-size: 14px; color: #6b7280;">
                Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui:<br>
                <strong>📞 Telepon:</strong> 0896-1829-7321<br>
                <strong>📧 Email:</strong> smknlciomas@gmail.com<br>
                <strong>📱 Instagram:</strong> @smkn1ciomas
            </p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis dari sistem Ekstrakurikuler SMK Negeri 1 Ciomas</p>
            <p>&copy; {{ date('Y') }} Ekstrakurikuler. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
