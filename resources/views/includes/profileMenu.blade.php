              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                  {!! Html::image( Auth::user()->propic, 'user', array('class' => 'user-image')) !!}
                  <span class="hidden-xs ">{{ Auth::user()->name  }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    {!! Html::image(Auth::user()->propic, 'User profile picture', array('class' => 'img-circle')) !!}
                    <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                    
                    <p>
                      {{ Auth::user()->name  }}
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                    <a href="{!!route('profile')!!}" class="btn btn-default">Profile</a>
                  </li>
                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      {{--<a href="{!!route('password.change')!!}" class="btn btn-default btn-flat">Change Password</a>--}}
                    </div>
                    <div class="pull-right">
                      <a href="{!! route('logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>