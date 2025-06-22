@extends('frontend.teacher_dashboard')

@section('teacher')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{-- @php
    $teacher = App\Models\Teacher::first();
    $depart = App\Models\Department::first();
@endphp --}}

@php
$id = Auth::guard('teacher')->id();
$profile = App\Models\Teacher::find($id);
@endphp

<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('teacher.view' , $profile->id) }}">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">{{ $profile->first_name }}</p>
                                <h4 class="mb-2">{{ $profile->last_name }}</h4>
                                <p class="text-muted mb-0">
                                    <span class="text-success fw-bold font-size-12 me-2">
                                        <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $profile->roll_id }}%
                                    </span>
                                </p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <img class="header-profile-user"
                            src="{{ !empty($profile->photo) ? asset($profile->photo) : asset('uploads/no_image.png') }}"
                            alt="Header Avatar">
                                </span>
                            </div>
                        </div>
                    </a>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
</div>




</div>

@endsection

