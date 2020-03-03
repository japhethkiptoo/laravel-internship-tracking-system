<!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="{{url('/supervisor').'/'}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            <li><a href="{{route('sup.students')}}" class=""><i class="lnr lnr-code"></i> <span>Students</span></a></li>
            <li><a href="{{route('sup.notifications')}}" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="#" class="">My Profile</a></li>
                  <li>
                    <a href="{{route('sup.logout')}}" onclick="event.preventDefault(); document.getElementById('logoutform1').submit();
                            ">Logout
                            <form id="logoutform1" style="display: none;" method="POST" action="{{route('sup.logout')}}">
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