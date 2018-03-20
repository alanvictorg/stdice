<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(Auth::user()->imagepath)
                    <img src="{{asset(Auth::user()->imagepath)}}" class="img-circle" alt="User Image">
                @else
                    <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                @if(Auth::user())
                    <p>{{ Auth::user()->name }}</p>
                @endif
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            @can('dashboard.index')
                <li {{ $rota_atual == 'dashboard.index' ?  "class=active" : ""}} ><a
                            href="{{ route('dashboard.index') }}"><i class='fa fa-home'></i> <span>Inicial</span></a>
                </li>
            @endcan
            @can('users.index')
                <li {{ $rota_atual == 'users.index' ?  "class=active" : ""}}><a href="{{ route('users.index') }}"><i
                                class='fa fa-user'></i> <span>Usuários</span></a></li>
            @endcan
            @can('teachers.index')
                <li {{ $rota_atual == 'teachers.index' ?  "class=active" : ""}}><a href="{{ route('teachers.index') }}"><i
                                class='fa fa-male'></i> <span>Professores</span></a></li>
            @endcan
            @can('courses.index')
                <li {{ $rota_atual == 'courses.index' ?  "class=active" : ""}}><a href="{{ route('courses.index') }}"><i
                                class='fa fa-graduation-cap'></i> <span>Cursos</span></a></li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>