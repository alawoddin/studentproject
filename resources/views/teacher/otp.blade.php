<!DOCTYPE html>
<html>
<head>
    <title>Teacher OTP Verification</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        input { padding: 8px; width: 200px; margin-bottom: 10px; }
        button { padding: 8px 15px; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <h2>Enter OTP</h2>

    @if(session('message'))
        <p style="color: green">{{ session('message') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('teacher.otp.verify') }}">
        @csrf
        <input type="text" name="otp" placeholder="Enter OTP" required />
        <br>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
