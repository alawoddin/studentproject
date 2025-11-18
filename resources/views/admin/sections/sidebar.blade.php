<div class="vertical-menu">

    <div data-simplebar class="h-100">

        @php
            $adminData = App\Models\User::find(Auth::user()->id);
        @endphp

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="https://tawanatechnology.com/frontend/images/logo5.png" alt=""
                    class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $adminData->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    {{ $adminData->name }}</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>





                <li class="menu-title">Pages</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-building-line"></i>
                        <span>Department</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="{{ route('add.depart') }}">Add Department</a></li> --}}
                        <li><a href="{{ route('all.depart') }}">Manage Department</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="mdi mdi-school font-size-24"></i>
                        <span>Students</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{ route('manage.student') }}">
                                <i class="mdi mdi-school font-size-24"></i>
                                <span>Students</span>
                            </a>
                        </li>



                        {{-- adding paid --}}
                        <li>
                            <a href="{{ route('manage.paid') }}">
                                <i class="mdi mdi-cash font-size-24"></i>
                                <span>Paid</span>
                            </a>

                        </li>

                    </ul>
                </li>
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-teach font-size-24"></i>
                        <span>Teacher</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{ route('manage.teacher') }}">
                                <i class="mdi mdi-teach font-size-24"></i>
                                <span>Teacher</span>
                            </a>

                        </li>
                        {{-- Teacher Show Salary --}}
                        <li>
                            <a href="{{ route('teachershow.salary') }}">
                                <i class="mdi mdi-cash font-size-24"></i>
                                <span>Teacher Salary</span>
                            </a>
                        </li>
                    </ul>
                </li>


                



                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-settings-3-line"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        {{-- adding salary --}}
                        <li>
                            <a href="{{ route('all.leet') }}" >
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>Due Stuff</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('attendance.index') }}" >
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>Student attendance</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-money-dollar-circle-line"></i>
                                <span>Salary</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('add.salary') }}">Add salary</a></li>
                                <li><a href="{{ route('all.salary') }}">all salary</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-group-line"></i>
                                <span>Staff</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li><a href="{{ route('add.staf') }}">Add Staff</a></li>
                                <li><a href="{{ route('manage.staf') }}">Manage Staff</a></li>

                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-wallet-3-line"></i>
                                <span>Expense</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('add.expense') }}">Add Expense</a></li>
                                <li><a href="{{ route('manage.expense') }}">Manage Expense</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-file-chart-line"></i>
                                <span>Manage Reports</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.all.reports') }}">All Reports</a></li>

                            </ul>
                        </li>

                              <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-file-chart-line"></i>
                                <span>Teacher Reports</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('teacher.all.reports') }}">All Reports</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="ri-loader-2-line"></i>
                                <span>Waiting</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('add.pending') }}">Add Pending</a></li>
                                {{-- {{-- <li><a href="{{ route('manage.expense') }}">Done</a></li> --}}
                                <li><a href="{{ route('all.pending') }}">All Pending</a></li>
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
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>