<!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        @auth()
        <nav>
          <ul class="nav">
            <li><a href="{{route('lec.dashboard').'/'}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            <li><a href="{{route('mystudents')}}" class=""><i class="lnr lnr-chart-bars"></i> <spa>My Students</span></a></li>
            @if(Auth::user()->is_hod())
              <li><a href="{{route('courses')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Courses</span></a></li>

              <li><a href="{{route('lecturers')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Lecturers</span></a></li>

              <li><a href="{{route('students')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Students</span></a></li>
            @endif
            
            <li><a href="{{route('notifications.lec')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>Notifications <span class="badge">
              {{Auth::guard()->user()->unreadNotifications()->count()}}
            </span></span></a></li>
            
            <li><a href="{{route('myassigned')}}" class=""><i class="lnr lnr-alarm"></i> 
              <span>My Courses</span></a></li>
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('leclogoutform1').submit();
                            ">Logout
                            <form id="leclogoutform1" style="display: none;" method="POST" action="{{route('logout')}}">
                              {{ csrf_field() }}
                            </form>
                  </a>   
                  </li>
                    
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        @endauth
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->