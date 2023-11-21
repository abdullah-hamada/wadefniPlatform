<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"><a href="{{route('home')}}">{{trans('main_trans.Programname')}} </a></li>

                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">{{trans('main_trans.Users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('users.index')}}">{{trans('main_trans.Users_list')}}</a></li>
                        </ul>
                    </li>

                    <!-- Jobs-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Jobs-menu">
                            <div class="pull-left"><i class="fa fa-briefcase"></i><span
                                    class="right-nav-text">{{trans('main_trans.Jobs')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Jobs-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('jobs.index')}}">{{trans('main_trans.Jobs_list')}}</a></li>
                            <li><a href="{{route('jobs.available')}}">{{trans('main_trans.avaliable_jobs')}}</a></li>

                        </ul>
                    </li>

                    <!-- Applications-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Applications-menu">
                            <div class="pull-left"><i class="fa fa-briefcase"></i><span
                                    class="right-nav-text">{{trans('main_trans.Applications')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Applications-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('applications.index')}}">{{trans('main_trans.Applications_list')}}</a></li>
                        </ul>
                    </li>

                    <!-- Categories-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Categories-menu">
                            <div class="pull-left"><i class="fa fa-briefcase"></i><span
                                    class="right-nav-text">{{trans('main_trans.Categories')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Categories-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('categories.index')}}">{{trans('main_trans.Categories_list')}}</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
