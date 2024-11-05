<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"> <span>Admin Dashboard </span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                @if (Auth::guard('admin')->user()->image !== null)
                    <img src="{{ asset('/public/images/profile_img') . '/' . Auth::guard('admin')->user()->image }}"
                        alt="..." class="img-circle profile_img">
                @else
                    <img src="{{ asset('/public/images/static_img/admin1.jpg') }}" alt="..."
                        class="img-circle profile_img">
                @endif
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('admin')->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    {{-- home --}}
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard <span
                                class="fa fa-chevron-down"></span></a>
                    </li>
                    {{-- user --}}
                    <li><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.alluser') }}">All Users</a></li>
                            <li><a href="{{ route('admin.adduser') }}">Add User</a></li>
                        </ul>
                    </li>
                    {{-- News-paper --}}
                    <li class="new-manage"><a><i class="fa fa-file-text-o"></i> News-paper Management <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.allnewspaper') }}">All News-papers</a></li>
                            <li><a href="{{ route('admin.addnewspaper') }}">Add News-paper</a></li>
                        </ul>
                    </li>
                    {{-- Content --}}
                    <li>
                        <a><i class="fa fa-columns"></i>Content Management <span
                            class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('admin.allpage')}}">Page List</a></li> 
                                <li><a href="{{route('admin.addBanner')}}">Banner Menu</a></li>                               
                            </ul>
                    </li>

                    <li><a href="{{route('admin.allPageSetting')}}"><i class="fa fa-cogs"></i> Settings <span
                        class="fa fa-chevron-down"></span></a>

                    {{-- <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('admin.allPageSetting')}}">All Setting</a></li>
                            <li><a href="{{route('admin.addPageSetting')}}">Add Setting</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>

        </div>
        <!-- /sidebar menu  -->
    </div>
</div>
