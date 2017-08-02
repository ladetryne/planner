  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">PROJECT PRO</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="/mytasks"><i class="fa fa-link"></i> <span>Mine Oppgaver</span></a></li>
        <li><a href="/tasks"><i class="fa fa-link"></i> <span>Alle Oppgaver</span></a></li>
        <li><a href="/newtasks"><i class="fa fa-link"></i> <span>Lag Ny Oppgave</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Kalender</span></a></li>

        {{-- meny knapp med underknapper START --}}
{{--         <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> --}}
        {{-- meny knapp med underknapper STOPP --}}


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>