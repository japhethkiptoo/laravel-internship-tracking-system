<!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="{{route('lec.dashboard')}}"><h4>Intern</h4></a>
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
          @auth()
          @php $notifications = Auth::user()->unreadNotifications; @endphp
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                <i class="lnr lnr-alarm"></i>
                <span class="badge bg-danger">{{ $notifications->count()}}</span>
              </a>
              <ul class="dropdown-menu notifications">
                @foreach($notifications as $notification)
                
                <li><a href="{{route('notification.read',['id'=>$notification->id])}}" class="notification-item"><span class="dot bg-success"></span>                  
                {{$notification->data['message']}} from  {{$notification->data['student']['fname']}}
                <p> at {{$notification->created_at}}</p>
                </a></li>
                @endforeach
                @if($notifications->count() < 1)
                <li><a href="#" class="more">No notifications</a></li>
                @else
                <li><a href="{{route('notifications.lec')}}" class="more">See all notifications</a></li>
                @endif
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">Basic Use</a></li>
                <li><a href="#">Working With Data</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Troubleshooting</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{Auth::user()->fname}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('leclogoutform').submit();
                            "><i class="lnr lnr-exit"></i> <span>Logout</span>
                            <form id="leclogoutform" style="display: none;" method="POST" action="{{route('logout')}}">
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