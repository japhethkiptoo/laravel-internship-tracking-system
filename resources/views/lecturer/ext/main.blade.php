<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/flavicon.png')}}" sizes="96x96">
    <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}{{':lecturer'}}</title>
  <!-- VENDOR CSS -->
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css')}}">
  <link href="{{ asset('css/datatables.min.css')}}" rel="stylesheet">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
  <style>

.html5buttons {
    float: right;
}
.dataTables_length {
    float: left;
}
</style>

</head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        @section('topnav')

            @include('lecturer.inc.header')
        
        @show

        @section('sidenav')

         @include('lecturer.inc.sidenav')

        @show

        @yield('content')
        
        <footer>
          <div class="container-fluid">
            <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
          </div>
    </footer>

    </div> <!-- end wrapper-->

    
      <!-- bootstrap -->
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
      <script src="{{ asset('assets/vendor/toastr/toastr.min.js')}}"></script>
      <script src="{{ asset('assets/scripts/klorofil-common.js')}}"></script>
      <script src="{{ asset('js/datatables.min.js')}}"></script>

      @yield('scripting')
      <script  type="text/javascript">
        var home = '{{url('/')}}';
        toastr.options.closeButton = true;
        toastr.options.escapeHTML = true;

      </script>
        @if(Session::has('status'))
         <script type="text/javascript">
          
          var status = '{{Session::get('status')}}';
          
          switch(status){
            case 'success':
            toastr.success('{{Session::get('message')}}','Success');
            break;

            case 'warning':
            toastr.warning('{{Session::get('message')}}','Warning');
            break;

            case 'error':
            toastr.error('{{Session::get('message')}}','Error');
            break;
          }
        </script>

          @endif
        <script type="text/javascript">

        function mySpy(){
          var current = window.location.href;

          var links = $('.sidebar#sidebar-nav nav .nav>li a');
            for (var i = links.length - 1; i >= 0; i--) {
              $(links[i]).removeClass('active');
            }
           
          $.each(links,function(key , val){
            var href = $(val).attr('href');
            console.log('current'+current);
            console.log('href'+href);
            var isSim = href == current;
            if(isSim){
               $(val).addClass('active');
            }
          });

        }
        mySpy();

      </script>
</body>
</html>
