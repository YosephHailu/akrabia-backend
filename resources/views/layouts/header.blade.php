<div class="main-content mb-1" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-light pl-0 shadow bg-white header">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <button class="btn p-2" onclick="hideSideNav()"><i class="fa fa-bars text-lg"></i></button>
          <div class="py-2" >
            <a class="" href="{{ url('home')}}"> 
              <img src="{{asset('img/logo.png')}}" class="navbar-brand-img" style="width: 250px; height: 50px; object-fit: cover;" alt=""> 
            </a>
          </div>
         
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
     
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">

                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm font-weight-bold"> {{__('log.language')}} </span>
                  </div>
                </div>
              </a>
             
              <div class="dropdown-menu  dropdown-menu-right changeLang">
                <a href="{{ url('changeLanguage?lang=en') }}" class="dropdown-item">  <img src="{{asset('img/flags/en.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>English</span></a>
                <a href="{{ url('changeLanguage?lang=am') }}" class="dropdown-item">  <img src="{{asset('img/flags/am.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"> <span>Amharic</span> </a>
                <a href="{{ url('changeLanguage?lang=or') }}" class="dropdown-item">  <img src="{{asset('img/flags/or.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>Affan Oromo</span> </a>
                <a href="{{ url('changeLanguage?lang=ti') }}" class="dropdown-item">  <img src="{{asset('img/flags/ti.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>Tigrigna</span> </a>
                <a href="{{ url('changeLanguage?lang=af') }}" class="dropdown-item">  <img src="{{asset('img/flags/af.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>Afar</span> </a>
                <a href="{{ url('changeLanguage?lang=so') }}" class="dropdown-item">  <img src="{{asset('img/flags/so.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>Somali</span> </a>
                <a href="{{ url('changeLanguage?lang=si') }}" class="dropdown-item">  <img src="{{asset('img/flags/si.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>Sidamic</span> </a>
                <a href="{{ url('changeLanguage?lang=ar') }}" class="dropdown-item">  <img src="{{asset('img/flags/ar.png')}}" alt="" width="30" height="20"  style="margin-right:10px;"><span>Arabic</span> </a>
              </div>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  
                  <i class='fa fa-user-circle fa-1x'></i>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm font-weight-normal"> {{ Auth::user()->name }}</span>|
                    <span class="mb-0 text-sm font-weight-normal"> {{Auth::user()->name ?? ""}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">{{__('log.welcome')}}!</h6>
                </div>
                <a href="{{ url('change-password')}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>{{__('log.c_pass')}}</span>
                </a>
               
                <div class="dropdown-divider"></div>
                <a href="{{ url('logout')}}" class="dropdown-item">
                  <i class="ni ni-button-power"></i>
                  <span>{{__('log.logout')}}</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script>
      function() {
        $("#LocaleSelect").change(function() {
          alert( "Handler for .select() called." );
        });
      }();

    </script>