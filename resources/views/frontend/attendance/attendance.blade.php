@extends('frontend.teacher_dashboard')

@section('teacher')


    <div class="container">
        <h2>لیست همه حاضری‌ها</h2>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>تخلص</th>
                    <th>تاریخ</th>
                    <th>حاضر</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atten as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->lastname }}</td>
                        <td>{{ $row->father_name }}</td>
                        <td>{{ $row->is_present ? 'بلی' : 'نخیر' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection