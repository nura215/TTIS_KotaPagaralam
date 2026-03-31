<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Aduan Baru Masuk</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1f2937; line-height: 1.7;">
    <h2 style="margin-bottom: 12px;">Aduan Baru Masuk</h2>
    <p>Terdapat aduan siber baru yang masuk melalui website.</p>
    <ul>
        <li><strong>Nama:</strong> {{ $aduan->nama }}</li>
        <li><strong>Kategori:</strong> {{ $aduan->kategori }}</li>
        <li><strong>Kode tiket:</strong> {{ $aduan->kode_tiket }}</li>
    </ul>
</body>
</html>
