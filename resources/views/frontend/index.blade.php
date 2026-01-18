@extends('frontend.teacher_dashboard')

@section('teacher')


<div class="container-fluid">

   
<div class="row">
       


          <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Active Student</h4>

                        {{-- @php
                            $paids = App\Models\Paid::with(['department', 'subject', 'student'])->limit('5')->get();

                        @endphp --}}

                        {{-- <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Enter day </th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>

                                    @foreach ($paids as $key => $paid)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <h6 class="mb-0">{{ $paid->student->name }}</h6>
                                            </td>
                                            <td>{{ $paid->subject->subject_name  }}</td>
                                            <td>
                                                {{ $paid->created_at->format('d M Y') }}
                                            </td>
                                        </tr>
                                        <!-- end -->
                                    @endforeach


                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div> --}}
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
            
        </div>
</div>




</div>

@endsection

