<!DOCTYPE html>
<html>
<head>
    <title>Your QR Code</title>
</head>
<body>
    <h1>Your QR Code</h1>
    <div>{!! $qrCode !!}</div>
    <p>Your unique barcode: {{ $user->barcode }}</p>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
</body>
</html>
