<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="/home" class="simple-text logo-normal">
            {{ __('EADIC') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Admin usuarios') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-normal">{{ __('Mi perfil') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">

                                <span class="sidebar-normal"> {{ __('Lista de usuarios') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li
                class="nav-item {{ $activePage == 'registro.create' || $activePage == 'registro.index' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#registro.index" aria-expanded="true">

                    <p>{{ __('Registros') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="registro.index">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'registro.index' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('registro.index') }}">
                                <i class="material-icons">content_paste</i>
                                <p>{{ __('Lista de registros') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'registro.create' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('registro.create') }}">

                                <span class="sidebar-normal"> {{ __('Crear registro') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('table') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
