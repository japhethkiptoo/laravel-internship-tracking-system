<!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="{{url('/').'/'}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

            <li>
              <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Tasks</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages1" class="collapse ">
                <ul class="nav">
                  <li><a href="{{route('field.index')}}" class="">Add Task</a></li>
                  <li><a href="{{route('all.tasks')}}" class="">All Tasks</a></li>
                </ul>
              </div>
            </li>
            <li><a href="{{route('firm.index')}}" class=""><i class="lnr lnr-chart-bars"></i> <span>My Firm</span></a></li>
            
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="{{route('profile.index')}}" class="">My Profile</a></li>
                  <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logoutform1').submit();
                            ">Logout
                            <form id="logoutform1" style="display: none;" method="POST" action="{{route('logout')}}">
                              {{ csrf_field() }}
                            </form>
                  </a>   
                  </li>
                    
                </ul>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->