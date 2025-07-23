@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">ثبت حاضری شاگردان - تاریخ: {{ date('Y-m-d') }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('store.attendance') }}">
            @csrf

            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>نام شاگرد</th>
                        <th>حاضر؟</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <input type="checkbox" name="present[{{ $student->id }}]" value="1">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-success mt-3">ثبت حاضری</button>
        </form>
    </div>
@endsection
