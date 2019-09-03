<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    @yield('style')
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="admin-page">
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light " id="main-menu">
        <a class="navbar-brand">Navbar</a>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </div>
        </div>
    </nav>



    <div class="navbar-default sidebar" role="navigation" >
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <ul class="list-unstyled components" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#userMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i>Users</a>
                        <ul class="collapse list-unstyled" id="userMenu">
                            <li>
                                <a href="{{route('admin.users.index')}}">All Users</a>
                            </li>
                            <li>
                                <a href="{{route('admin.users.create')}}">Create User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#postMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i>Posts</a>
                        <ul class="collapse list-unstyled" id="postMenu">
                            <li>
                                <a href="{{route('admin.posts.index')}}">All Posts</a>
                            </li>
                            <li>
                                <a href="{{route('admin.posts.create')}}">Create Post</a>
                            </li>
                            <li>
                                <a href="{{route('admin.comments.index')}}">All Comments</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}"><i class="fa fa-wrench fa-fw"></i> Categories</a>
                    </li>
                    <li>
                        <a href="#mediaMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i>Media</a>
                        <ul class="collapse list-unstyled" id="mediaMenu">
                            <li>
                                <a href="{{route('admin.media.index')}}">All Media</a>
                            </li>

                            <li>
                                <a href="{{route('admin.media.create')}}">Upload Media</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#chartMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                        <ul class="collapse list-unstyled" id="chartMenu">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li>
                    <li>
                        <a href="#ulMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-wrench fa-fw"></i> UI Elements</a>
                        <ul class="collapse list-unstyled" id="ulMenu">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#multiMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown</a>
                        <ul class="collapse list-unstyled" id="multiMenu">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#multiMenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Third Level</a>
                                <ul class="collapse list-unstyled" id="multiMenu2">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</div>






<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
@yield('scripts')
@yield('footer')

</body>

</html>
