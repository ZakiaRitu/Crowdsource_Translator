      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">


            <li class="{!! Menu::isActiveRoute('dashboard') !!}">
              <a href="{!!  route( 'dashboard') !!}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
              <ul class="treeview-menu">
                <li class="{!! Menu::isActiveRoute('dashboard') !!}">
                  <a href="{!!  URL::to( 'dashboard') !!}"><i class="fa fa-circle-o"></i> Dashboard</a>
                </li>
              </ul>
            </li>



          @role('admin')
            <!-- Demo CRUD  -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Sentences</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('sentence.index') }}"><i class="fa fa-circle-o"></i> Index Sentence</a></li>
                <li><a href="{{ route('sentence.create') }}"><i class="fa fa-circle-o"></i> New Sentence</a></li>
              </ul>
            </li>
            <!-- Demo CRUD  -->
            @endrole


            <li class="{!! Menu::isActiveRoute('translation.create') !!}">
              <a href="{!!  URL::route( 'translation.create') !!}"><i class="fa fa-circle-o"></i> Translate</a>
            </li>

            <li class="{!! Menu::isActiveRoute('leaderboard') !!}">
              <a href="{!!  URL::route( 'leaderboard') !!}"><i class="fa fa-circle-o"></i> Leaderboard</a>
            </li>


            <li class="{!! Menu::isActiveRoute('history') !!}">
              <a href="{!!  URL::route( 'history') !!}"><i class="fa fa-circle-o"></i> History</a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside> 