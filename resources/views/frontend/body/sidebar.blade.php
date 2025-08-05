<div class="vertical-menu">

    <div data-simplebar class="h-100">

        {{-- @php
        $id = Auth::guard('teacher')->id();
        $teacher = App\Models\Teacher::find($id);
        @endphp --}}

        {{-- @php
        $teacher = App\Models\Teacher::first();
        @endphp --}}

        @php
            $id = Auth::guard('teacher')->id();
            $profile = App\Models\Teacher::find($id);
        @endphp

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div>


                <img class="rounded-circle header-profile-user" src="{{ $profile && $profile->photo ? asset($profile->photo) : asset('uploads/no_image.png') }}" alt="">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1"> {{ $profile ? $profile->name : 'N/A' }}</h4>
                <span class="text-muted">
                    <i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    {{ $profile ? $profile->email : 'N/A' }}
                </span>
            </div>
        </div>


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('teacher.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>





                <li class="menu-title">Pages</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-3-line font-size-24"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @php
                        $id = Auth::guard('teacher')->id();
                        $profile = App\Models\Teacher::find($id);
                        @endphp

                        <li>
                            <a href="{{ route('teacher.view' , $profile ? $profile->id: 1) }}"> 
                               <i class="mdi mdi-teach font-size-24"></i>
                                <span>Class</span>
                            </a>

                        </li>
                        {{-- Teacher Show Salary --}}
                        <li>
                            <a href="{{route('all.attendance')}}">
                                <i class="mdi mdi-cash font-size-24"></i>
                                <span>Manage Attendance</span>
                            </a>
                        </li>
                    </ul>
                </li>

              


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
