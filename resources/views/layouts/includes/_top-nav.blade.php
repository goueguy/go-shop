<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('assets/images/img.jpg')}}" alt="">{{Auth::user()->role->name}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                {{-- <a class="dropdown-item"  href="javascript:;"> Profile</a> --}}
                {{-- <a class="dropdown-item"  href="javascript:;">Help</a> --}}
                <a class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
        </nav>
    </div>
</div>
