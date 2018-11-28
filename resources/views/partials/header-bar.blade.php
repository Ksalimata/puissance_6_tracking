 <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav  navbar-right" style="color:black">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle"  data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/images/img_logo.png')}}" alt="">{{Auth::user()->username}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Déconnexion
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method  ="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->