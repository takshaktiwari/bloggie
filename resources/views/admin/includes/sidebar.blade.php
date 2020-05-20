<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo">
    <a href="{{url('/')}}" target="_blank">{{ config('app.name', 'Laravel') }}</a>
</div>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
  <div class="br-sideleft-menu">
        <a href="{{url('/admin/home')}}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{url('/admin/categories')}}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-th-large"></i>
                <span class="menu-item-label">Categories</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        


        <a href="#" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-blog"></i>
                <span class="menu-item-label">Blog Posts</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item">
                <a href="{{url('admin/post/create')}}" class="nav-link">Create Post</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/posts') }}" class="nav-link">Posts List</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/comments') }}" class="nav-link">Comments</a>
            </li>
        </ul>

        <a href="{{ url('admin/pages') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-file-alt"></i>
                <span class="menu-item-label">CMS Pages</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ url('admin/slider') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="far fa-images"></i>
                <span class="menu-item-label">Slider</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ url('admin/users') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-users"></i>
                <span class="menu-item-label">All Users</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ url('admin/settings') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-cogs"></i>
                <span class="menu-item-label">Settings</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        
        
        <a href="{{ url('admin/change_password') }}" class="br-menu-link">
            <div class="br-menu-item">
                <i class="fas fa-user-lock"></i>
                <span class="menu-item-label">Change Password</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a class="br-menu-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">

            <div class="br-menu-item">
                <i class="fas fa-power-off"></i>
                <span class="menu-item-label">{{ __('Logout') }}</span>
            </div><!-- menu-item -->
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        

    </div><!-- br-sideleft-menu -->
    <br>
    <br>
    <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->