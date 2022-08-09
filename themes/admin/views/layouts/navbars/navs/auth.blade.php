<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand border-bottom {{ $navClass ?? 'navbar-dark bg-primary' }}">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <form class="navbar-search {{ $searchClass ?? 'navbar-search-light' }} form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="{{ __('Search') }}" type="text">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
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
            <ul class="navbar-nav align-items-center ml-auto ml-md-0" id="logout">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img src="{{asset('/admin/img/default_avatar.png')}}" class="navbar-brand-img">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('Welcome!') }} {{ auth()->user()->name }}</h6>
                        </div>

                        @if(in_array(env('APP_ENV'), ['local','dev']))
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.home.lang', ['code'=>'en']) }}" class="dropdown-item">
                                <i class="fa-solid fa-flag"></i>
                                <span>Tiếng anh</span>
                            </a>
                            <a href="{{ route('admin.home.lang', ['code'=>'jp']) }}" class="dropdown-item">
                                <i class="fa-solid fa-flag"></i>
                                <span>Tiếng nhật</span>
                            </a>
                            <div class="dropdown-divider"></div>
                        @endif

                        <a href="{{ route('admin.admin.management.edit', auth()->user()->id) }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>{{ __('My profile') }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin-logout') }}" id="logout-btn" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
