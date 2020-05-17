<!DOCTYPE html>
<html lang="en">

<head>

    
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<script src="http://demo.expertphp.in/js/jquery.js"></script>
<script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <style>

body {
  overflow-x: hidden;
}
.active {
  background-color: green;
  color: white;
}
.dropdown-container {
  display: none;
  background-color: none;
  padding-left: 8px;
}
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
.dropdown-btn {
  padding: 6px 8px 6px 20px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  display: block;
  border: none;
  background: none;
  text-align: left;
  cursor: pointer;
  font-size:15px;
  outline: none;
  width: 15rem;
  }
  .dropdown-btn:hover {
  background-color: rgba(255, 255, 255, 0.84);
  color:black;
}
#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}
#sidebar-wrapper.sidebar-open{
  margin-left: 0;

}
#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}

.site-footer
{
  background-color:#26272b;
  padding:20px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
.bg-light{background-color:#778899!important} /* origin #484848 */
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
.text-color{
    color: white
}
.bg-black {
    background-color:#2C3E50 /* origin black */
}
.navbar-light .navbar-brand, .navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
    color: white;
}
.navbar-light .navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.84);
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}

</style>

</head>

<body>
<nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                <img src="../../images/erech_logo.png" style="width:100px;height:50px">
                <a class="navbar-brand" href="{{ url('/home') }}">
                     Erech Company
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @if (Route::has('registernew'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('registernew') }}">{{ __('Registernew') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <!-- <div class=" text-color sidebar-heading">Start Bootstrap </div> -->
      <div class="list-group list-group-flush">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light text-color">Dashboard</a>
        <button class="dropdown-btn" >Covenants <i class="fa fa-caret-down"></i>
        </button>

        <div class="dropdown-container">
        <a href="{{ url('covenants_ibi') }}" class="list-group-item list-group-item-action bg-light text-color">Covenants Ibi</a>
      <!--<a href="{{ url('importExportView') }}" class="list-group-item list-group-item-action bg-light text-color">Import/Export</a>-->
      <a href="{{ url('covenants_hapoalim') }}" class="list-group-item list-group-item-action bg-light text-color">Covenants Hapoalim</a>
      <a href="{{ url('covenants_mizrahi') }}" class="list-group-item list-group-item-action bg-light text-color">Covenants Mizrahi</a>
      </div>
        <!-- <a href="{{ url('covenants_ibi') }}" class="list-group-item list-group-item-action bg-light text-color">Covenants Ibi</a> -->
        <!--<a href="{{ url('importExportView') }}" class="list-group-item list-group-item-action bg-light text-color">Import/Export</a>-->
        <!-- <a href="{{ url('covenants_hapoalim') }}" class="list-group-item list-group-item-action bg-light text-color">Covenants Hapoalim</a> -->
        <!-- <a href="{{ url('covenants_mizrahi') }}" class="list-group-item list-group-item-action bg-light text-color">Covenants Mizrahi</a> -->
        <a href="{{ url('client_data/create') }}" class="list-group-item list-group-item-action bg-light text-color">Query</a>
        <a href="{{ url('customers') }}" class="list-group-item list-group-item-action bg-light text-color">Customers</a>
        <a href="{{ url('client_data') }}" class="list-group-item list-group-item-action bg-light text-color">Transaction data</a>
        @if (Gate::allows('manager')) 
        <a href="{{url('users')}}" class="list-group-item list-group-item-action bg-light text-color">access to users </a>
        @endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="app" style="width:100%">



      <div class="container-fluid" style="padding: 3% 3%;">
      @yield('content')
        <!-- <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p> -->
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    jQuery(".navbar-toggler").click(function(e) {
      jQuery("#sidebar-wrapper").toggleClass("sidebar-open");
    });
    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}  
  </script>

</body>
<footer class="site-footer">
     
     </div>
     <div class="container">
       <div class="row">
         <div class="col-md-8 col-sm-6 col-xs-12">
           <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
        <a href="#">EI group</a>.
           </p>
         </div>

         <div class="col-md-4 col-sm-6 col-xs-12">
           <ul class="social-icons">
             <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
             <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
             <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
             <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
           </ul>
         </div>
       </div>
     </div>
</footer>
</html>