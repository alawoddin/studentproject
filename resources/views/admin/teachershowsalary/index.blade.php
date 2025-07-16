@extends('admin.admin_dashboard')
@section('admin')

  @php
        $teacher = App\Models\Teacher::with('department')->get();
@endphp
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Teacher's</h4>

                                    

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        @foreach ($teacher as $key => $pend)
                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-body">

                                        <div class="d-flex align-items-center">
                                            <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg" src="{{asset($pend->photo)}}" alt="Generic placeholder image">
                                            <div class="flex-grow-1">
                                                <a href="{{ route('view.teachers', $pend->id)}}"><h5 class="mt-0 font-size-18 mb-1">{{ $pend->first_name }}</h5></a>
                                                <p class="text-muted font-size-14">{{ $pend->last_name }}</p>

                                                <ul class="social-links list-inline mb-0">
                                                    
                                                    <li class="list-inline-item">
                                                        <a role="button" class="text-reset" title="{{$pend->phone}}" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href=""><i class="fas fa-phone-alt"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a role="button" class="text-reset" title="{{$pend->email}}" data-bs-placement="top" target="_blank" data-bs-toggle="tooltip" class="tooltips" href="https://mail.google.com/mail/u/0/#inbox?compose=new"><i class="fas fa-envelope"></i></a>
                                                    </li>
                                                     <li class="list-inline-item">
                                                        <a role="button" class="text-reset" title="Teacher" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href="{{ route('view.teachers', $pend->id)}}"><i class="fas fa-clipboard"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        @endforeach 
                        </div> <!-- end row -->


                     

                    </div> <!-- container-fluid -->
                </div>

@endsection
