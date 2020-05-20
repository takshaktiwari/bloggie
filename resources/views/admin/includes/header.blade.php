<!-- ########## START: HEAD PANEL ########## -->
<div class="br-header">
    <div class="br-header-left">
        <div class="navicon-left hidden-md-down">
            <a id="btnLeftMenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="navicon-left hidden-lg-up">
            <a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a>
        </div>
    </div><!-- br-header-left -->
    <div class="br-header-right">
        <nav class="nav">

            {{-- <div class="dropdown">
                <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                    <i class="tx-24 far fa-bell mt-1"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                    <!-- end: if statement -->
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                    <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                        <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                        <a href="#" class="tx-11">Mark All as Read</a>
                    </div><!-- d-flex -->

                    <div class="media-list">
                        <!-- loop starts here -->
                        <a href="#" class="media-list-link read">
                            <div class="media pd-x-20 pd-y-15">
                                <img src="{{ url('/assets/admin/') }}/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                                <div class="media-body">
                                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                    <span class="tx-12">October 03, 2017 8:45am</span>
                                </div>
                            </div><!-- media -->
                        </a>
                        <div class="pd-y-10 tx-center bd-t">
                            <a href="#" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                        </div>
                    </div><!-- media-list -->
                </div><!-- dropdown-menu -->
            </div> --}}

            <div class="dropdown">
                <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name hidden-md-down">Administrator</span>
                    <img src="{{ url('/assets/admin/img/admin-icon.png') }}" class="wd-32 rounded-circle" alt="">
                    <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li>
                            <a href="{{ url('admin/change_password') }}">
                                <i class="fas fa-user-lock mr-1"></i> 
                                Change Password
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">

                                <div class="">
                                    <i class="fas fa-power-off"></i>
                                    <span class="menu-item-label">{{ __('Logout') }}</span>
                                </div><!-- menu-item -->
                            </a>
                        </li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
    </div><!-- br-header-right -->
</div><!-- br-header -->
<!-- ########## END: HEAD PANEL ########## -->