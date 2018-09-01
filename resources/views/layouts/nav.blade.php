        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">E-Parking
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                       <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                       {{ __('Logout') }}
                   </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/user') }}"><i class="fa fa-users fa-fw"></i> Users</a>
            </li>
            <li>
                <a href="{{ url('parkinglot') }}"><i class="fa fa-car fa-fw"></i> Lokasi Parkir</a>
            </li>
            <li>
                <a href="{{ url('parking') }}"><i class="fa fa-credit-card fa-fw"></i> Transaksi Parkir</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-money fa-fw"></i> Topup
                   Saldo<span class="fa arrow"></span></a>
                   <ul class="nav nav-second-level">
                    <li>
                        <!-- <a href="?page=top-up-masuk">Top Up Masuk</a> -->
                    </li>
                    <li>
                        <a href="transfer">Transfer</a>
                    </li>
                    <li>
                        <a href="topup">Top Up</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="config"><i class="fa fa-cog fa-fw"></i> Config</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>