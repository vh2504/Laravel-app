<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-header py-0">
    <div class="container-fluid">
        <a class="navbar-brand py-2 py-sm-0" href="#">
            <span class="navbar-brand-lbl">{{ __('common-frontend.logo') }}</span>
            <button type="button" class="btn btn-sm">{{ __('common-frontend.text-logo') }}</button>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars fa-bars-m" aria-hidden="true"></i>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <ul class="navbar-nav navbar-nav-member @auth() navbar-nav-top @endauth align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-hover nav-link-icon" href="#" target="_blank">
                        <div class="position-relative">
                            <span class="nav-badge">1</span>
                            <img class="mb-2" src="{{ asset('dym/img/icons/star.svg') }}" />
                        </div>
                        <span class="nav-link-inner--text">{{ __('common-frontend.menus.rate') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-hover nav-link-icon" href="#" target="_blank">
                        <img class="mb-2" src="{{ asset('dym/img/icons/time.svg') }}" />
                        <span class="nav-link-inner--text">{{ __('common-frontend.menus.time') }}</span>
                    </a>
                </li>
                @auth()
                <li class="nav-item active">
                    <a class="nav-link nav-link-hover nav-link-icon" href="#" target="_blank">
                        <img class="mb-2" src="{{ asset('dym/img/icons/account.svg') }}" />
                        <span class="nav-link-inner--text">{{ __('common-frontend.menus.accounted') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('logout') }}">
                        <img class="mb-2" src="{{ asset('dym/img/icons/logout.svg') }}" />
                        <span class="nav-link-inner--text nav-link-inner--logout">{{ __('common-frontend.menus.logout') }}</span>
                    </a>
                </li>
                @endauth
                @guest()
                <li class="nav-item active">
                    <a class="nav-link nav-link-hover nav-link-icon" href="#" target="_blank">
                        <img class="mb-2" src="{{ asset('dym/img/icons/account.svg') }}" />
                        <span class="nav-link-inner--text">{{ __('common-frontend.menus.account') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="#" target="_blank">
                        <img class="mb-2" src="{{ asset('dym/img/icons/login.svg') }}" />
                        <span class="nav-link-inner--text nav-link-inner--login">{{ __('common-frontend.menus.login') }}</span>
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
