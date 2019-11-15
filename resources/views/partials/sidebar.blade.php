<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>All football</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Laravel Sports Application </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>CRUD Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('teams.index')}}"><i class="fa fa-circle-o"></i>Teams</a></li>
            <li><a href="{{route('players.index')}}"><i class="fa fa-circle-o"></i> Players</a></li>
          <li><a href="{{route('matches.index')}}"><i class="fa fa-circle-o"></i> Matches</a></li>
          </ul>
        </li>
        {{-- <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>League Table</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Matches</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Standings</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Stats</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Players</a></li>
          </ul>
        </li> --}}
        {{-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="https://m.allfootballapp.com/news"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>