



<header id="page-topbar">

    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box ">
                <a href="{{ route('teacher.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm fw-bold  text-light">
                        TawanaTechnology
                    </span>
                    <span class="logo-lg fw-bold text-light">
                        TAWANA
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

          
        </div>

        <div class="d-flex">

          




            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

       

            @php

            $id = Auth::guard('teacher')->id();
            $profile = App\Models\Teacher::find($id);

        @endphp

        


        <div class="dropdown d-inline-block user-dropdown">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img class="rounded-circle header-profile-user" src="{{ $profile && $profile->photo ? asset($profile->photo) : asset('uploads/no_image.png') }}"
                    alt="">

                <span class="d-none d-xl-inline-block ms-1"> {{ $profile ? $profile->first_name : 'N/A' }} </span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('index') }}"><i
                        class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
            </div>
        </div>



        </div>
    </div>
</header>