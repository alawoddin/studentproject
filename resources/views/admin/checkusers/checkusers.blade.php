<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Centered Bootstrap Card</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
</head>
<body>

  <!-- Center card both vertically and horizontally -->
  <div class="container vh-100 d-flex justify-content-center align-items-center">

<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach ($teachers as $key => $teacher)
            <div class="card m-2 shadow" style="width: 18rem;">
                <!-- Card Image -->
                <img src="{{ !empty($teacher->photo) ? asset($teacher->photo) : asset('uploads/no_image.png') }}" 
                     class="card-img-top" alt="Teacher Image">

                <div class="card-body text-center">
                    <span>#{{ $key + 1 }}</span>
                    <h5 class="card-title">{{ $teacher->first_name }} {{ $teacher->last_name }}</h5>
                    <p class="card-text">{{ $teacher->email }}</p>

                    <!-- Visit Dashboard Button -->
                    <a href="{{ route('admin.teacher.impersonate', $teacher->id) }}" class="btn btn-primary">
    Login as Teacher
</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <div class="card shadow" style="width: 20rem;">
      

  </div>

</body>
</html>
