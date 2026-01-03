<form method="POST" action="{{ route('teacher.otp.verify') }}">
    @csrf

    <div class="mb-3">
        <label>Enter OTP</label>
        <input type="text" name="otp" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Verify OTP</button>
</form>
