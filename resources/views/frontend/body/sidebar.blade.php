
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
    $teacher = App\Models\Teacher::first();
    $depart = App\Models\Department::first();
@endphp

    @if($teacher)
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div>
                <img src="{{ !empty($teacher->photo) ? asset('uploads/teacher/' . $teacher->photo) : asset('uploads/no_image.png') }}"
                    alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $teacher->name }} </h4>
                <span class="text-muted">
                    <i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    {{ $teacher->email }}
                </span>
            </div>
        </div>
    @endif


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('index') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>





                <li class="menu-title">Pages</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Department</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Add Department</a></li>
                        <li><a href="#">Manage Department</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Teacher</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="#">Add Teacher</a></li>
                        <li><a href="#">Manage Teacher</a></li>
                     <li><a href="#">View All Teachers</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Add Student</a></li>
                        <li><a href="#">Manage Student</a></li>
                    </ul>
                </li>

                {{-- adding paid --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Paid</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Add Paid</a></li>
                        <li><a href="#">Manage Paid</a></li>
                    </ul>
                </li>





                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>

                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>