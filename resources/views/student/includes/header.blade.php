<!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="{{route('home')}}"><img src="{{ asset('assets/img/logo-dark.png')}}"  alt="Klorofil Logo" class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <form class="navbar-form navbar-left">
          <div class="input-group">
            <input type="text" value="" class="form-control" placeholder="Search dashboard...">
            <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
          </div>
        </form>
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">Basic Use</a></li>
                <li><a href="#">Working With Data</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Troubleshooting</a></li>
              </ul>
            </li>
            @auth
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{Auth::user()->fname}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="{{route('profile.index')}}"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();
                            "><i class="lnr lnr-exit"></i> <span>Logout</span>
                            <form id="logoutform" style="display: none;" method="POST" action="{{route('logout')}}">
                              {{ csrf_field() }}
                            </form>
                </a>      
              </li>
              </ul>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->