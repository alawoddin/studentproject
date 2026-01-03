<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f7f9fc;
        }
        .card {
            border-radius: 12px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4">

            <h4 class="text-center mb-3 fw-bold">Verify OTP</h4>
            <p class="text-center text-muted mb-4">
                Enter the OTP sent to your email
            </p>

            <!-- OTP Form -->
            <form method="POST" action="{{ route('teacher.otp.verify') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">OTP Code</label>
                    <input
                        type="text"
                        name="otp"
                        class="form-control form-control-lg text-center"
                        placeholder="Enter OTP"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                    Verify OTP
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">Resend OTP</a>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap 5 JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
