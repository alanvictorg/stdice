<header class="main-header ">
    <!-- Logo -->
    <a href="../../index2.html" class="logo alter-nav">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ST</b>ID</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Seminário</b>Teológico</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top alter-nav">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset(Auth::user()->imagepath)}}" class="user-image" alt="User Image">
              <span class="hidden-xs"> @if(Auth::user())
                  {{ Auth::user()->name }}
                @endif</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  @if(Auth::user()->imagepath)
                      <img src="{{asset(Auth::user()->imagepath)}}" class="img-circle" alt="User Image">
                  @else
                      <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                  @endif
                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" id="logout"
                     onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Sair
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      <input type="submit" value="logout" style="display: none;">
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>