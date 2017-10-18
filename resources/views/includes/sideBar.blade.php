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


            <li class="">
              <a href="{!!  route( 'dashboard') !!}">
                <i class="fa fa-dashboard"></i> <span>Export/Import</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="">
                <li><a href="{{ URL::to('fileToDatabase') }}" data-toggle="modal" class="deleteBtn" data-target="#deleteConfirm" style="color: red;" onclick="show_confirm()"><i class="fa fa-circle-o"></i> Import From File(Only 1 time)</a></li>
                <li><a href="{{ URL::to('databaseToFile') }}"><i class="fa fa-circle-o"></i>Export in File</a></li>
                <li><a href="{{ URL::to('sentenceJson') }}"><i class="fa fa-circle-o"></i>Export Json</a></li>
                </li>
              </ul>
            </li>


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

      <!-- Modal -->
      <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
              Are you sure to Import from file to database?
            </div>
            <div class="modal-footer">
              {!! Form::open(array('url' => URL::to('fileToDatabase'), 'method'=> 'post', 'class' => 'deleteForm')) !!}
              <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
              {!! Form::submit('Yes, Import', array('class' => 'btn btn-danger')) !!}
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
