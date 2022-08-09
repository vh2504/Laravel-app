<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="">
                <img src="{{asset('/admin/img/logo.svg')}}" class="navbar-brand-img">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'dashboards' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboards') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'dashboards' ? 'show' : '' }}" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
                                    <a href="" class="nav-link">{{ __('Dashboard') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item {{ $parentSection == 'post' ? 'active' : '' }}">
                        <a class="nav-link " href="{{route('admin.user.index')}}" aria-expanded="{{ $parentSection == 'post' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <img src="{{asset('admin/img/icons/side-bar/users.svg')}}" />
                            <span class="ml-2 nav-link-text">{{__('user.nav.title')}}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $parentSection == 'jobs' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('admin.job.index') }}" aria-expanded="{{ $parentSection == 'job' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5938 0H5.90625C5.13084 0 4.5 0.630844 4.5 1.40625V3C4.5 3.25884 4.70986 3.46875 4.96875 3.46875C5.22764 3.46875 5.4375 3.25884 5.4375 3V1.40625C5.4375 1.14778 5.64778 0.9375 5.90625 0.9375H22.5938C22.8522 0.9375 23.0625 1.14778 23.0625 1.40625V22.5938C23.0625 22.8522 22.8522 23.0625 22.5938 23.0625H5.90625C5.64778 23.0625 5.4375 22.8522 5.4375 22.5938V21.078C5.4375 20.8192 5.22764 20.6093 4.96875 20.6093C4.70986 20.6093 4.5 20.8192 4.5 21.078V22.5938C4.5 23.3692 5.13084 24 5.90625 24H22.5938C23.3692 24 24 23.3692 24 22.5938V1.40625C24 0.630844 23.3692 0 22.5938 0Z" fill="#212C5D"/>
                                <path d="M20.3387 18.0938H9.08873C8.82984 18.0938 8.61998 18.3037 8.61998 18.5625C8.61998 18.8213 8.82984 19.0312 9.08873 19.0312H20.3387C20.5976 19.0312 20.8075 18.8213 20.8075 18.5625C20.8075 18.3037 20.5976 18.0938 20.3387 18.0938Z" fill="#212C5D"/>
                                <path d="M20.67 20.6686C20.5828 20.5814 20.4623 20.5312 20.3386 20.5312C20.2153 20.5312 20.0944 20.5814 20.0072 20.6686C19.92 20.7558 19.8698 20.8767 19.8698 21C19.8698 21.1233 19.92 21.2442 20.0072 21.3314C20.0944 21.4185 20.2153 21.4688 20.3386 21.4688C20.4623 21.4688 20.5828 21.4186 20.67 21.3314C20.7572 21.2442 20.8073 21.1233 20.8073 21C20.8073 20.8767 20.7572 20.7558 20.67 20.6686Z" fill="#212C5D"/>
                                <path d="M18.4219 20.5312H9.08873C8.82984 20.5312 8.61998 20.7412 8.61998 21C8.61998 21.2588 8.82984 21.4688 9.08873 21.4688H18.4219C18.6808 21.4688 18.8906 21.2588 18.8906 21C18.8906 20.7412 18.6808 20.5312 18.4219 20.5312Z" fill="#212C5D"/>
                                <path d="M12.3739 4.11414C9.58448 4.11414 7.31508 6.38354 7.31508 9.17303C7.31498 10.6209 7.92661 11.9285 8.90484 12.8515C8.92149 12.8696 8.93939 12.8866 8.95899 12.9019C9.85955 13.7274 11.0588 14.2318 12.3739 14.2318C13.6889 14.2318 14.8882 13.7273 15.7888 12.9019C15.8084 12.8866 15.8263 12.8695 15.8429 12.8515C16.8211 11.9285 17.4328 10.6209 17.4328 9.17303C17.4328 6.38354 15.1634 4.11414 12.3739 4.11414ZM12.3739 13.2943C11.4109 13.2943 10.5242 12.9623 9.82181 12.4068C10.3194 11.4655 11.289 10.8732 12.3739 10.8732C13.4587 10.8732 14.4283 11.4655 14.9259 12.4068C14.2236 12.9623 13.3368 13.2943 12.3739 13.2943ZM11.3872 8.9491V8.58521C11.3872 8.04118 11.8298 7.59854 12.3738 7.59854C12.9179 7.59854 13.3605 8.04114 13.3605 8.58521V8.9491C13.3605 9.49309 12.9179 9.93573 12.3738 9.93573C11.8298 9.93573 11.3872 9.49314 11.3872 8.9491ZM15.6116 11.7203C15.1825 11.0359 14.5547 10.514 13.82 10.2163C14.1172 9.87756 14.298 9.43417 14.298 8.94915V8.58526C14.298 7.52425 13.4348 6.66109 12.3739 6.66109C11.3129 6.66109 10.4498 7.52425 10.4498 8.58526V8.94915C10.4498 9.43417 10.6305 9.87756 10.9278 10.2163C10.193 10.5141 9.56522 11.0359 9.13617 11.7203C8.583 11.0187 8.25253 10.1337 8.25253 9.17303C8.25249 6.90048 10.1013 5.05164 12.3739 5.05164C14.6464 5.05164 16.4952 6.90048 16.4952 9.17303C16.4952 10.1337 16.1648 11.0187 15.6116 11.7203Z" fill="#212C5D"/>
                                <path d="M12.3739 1.875C8.3498 1.875 5.07595 5.14884 5.07595 9.17292C5.07595 11.4995 6.1703 13.5753 7.87125 14.9125L2.43066 20.3531C2.08964 20.6941 1.53473 20.6941 1.19367 20.3531C1.02848 20.1879 0.9375 19.9682 0.9375 19.7346C0.9375 19.501 1.02848 19.2813 1.19372 19.1161L3.97622 16.3336C4.15927 16.1506 4.15927 15.8538 3.97622 15.6707C3.79317 15.4877 3.49636 15.4877 3.31331 15.6707L0.530859 18.4532C0.188484 18.7955 0 19.2506 0 19.7346C0 20.2186 0.188484 20.6737 0.530766 21.016C0.884063 21.3693 1.34812 21.546 1.81219 21.546C2.27625 21.546 2.74031 21.3693 3.09361 21.016L8.658 15.4516C9.74709 16.0987 11.0177 16.4709 12.3739 16.4709C16.398 16.4709 19.6718 13.197 19.6718 9.17297C19.6718 5.14889 16.398 1.875 12.3739 1.875ZM12.3739 15.5333C8.86674 15.5333 6.01341 12.6801 6.01341 9.17292C6.01341 5.66578 8.86669 2.8125 12.3739 2.8125C15.8811 2.8125 18.7343 5.66578 18.7343 9.17292C18.7343 12.6801 15.881 15.5333 12.3739 15.5333Z" fill="#212C5D"/>
                                <path d="M5.45157 14.1953C5.36438 14.1081 5.24391 14.0579 5.12016 14.0579C4.99688 14.0579 4.87594 14.108 4.78876 14.1953C4.70157 14.2824 4.65141 14.4033 4.65141 14.5266C4.65141 14.6499 4.70157 14.7708 4.78876 14.858C4.87594 14.9452 4.99688 14.9954 5.12016 14.9954C5.24391 14.9953 5.36438 14.9452 5.45157 14.858C5.53923 14.7708 5.58891 14.6499 5.58891 14.5266C5.58891 14.4033 5.53923 14.2824 5.45157 14.1953Z" fill="#212C5D"/>
                            </svg>
                            <span class="ml-2 nav-link-text">{{__('job.nav')}}</span>
                        </a>
                    </li>

                    <?php
                        /** @var Admin $admin */
                        $admin = auth()->user();
                    ?>
                    @if($admin->isSuperAdmin())
                    <li class="nav-item {{ $parentSection == 'admin' ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('admin.admin.management.index') }}" aria-expanded="{{ $parentSection == 'admin' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <img src="{{asset('admin/img/icons/side-bar/admin.svg')}}" />
                            <span class="ml-2 nav-link-text">{{__('admin.nav.main')}}</span>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item {{ $parentSection == 'post' ? 'active' : '' }}">
                        <a class="nav-link " href="{{route('admin.posts.index')}}" aria-expanded="{{ $parentSection == 'post' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <img src="{{asset('admin/img/icons/side-bar/post.svg')}}" />
                            <span class="ml-2 nav-link-text">{{__('post.nav.main')}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ $parentSection == 'userVoice' ? 'active' : '' }}">
                        <a class="nav-link " href="{{route('admin.userVoices.index')}}" aria-expanded="{{ $parentSection == 'userVoice' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <img src="{{asset('admin/img/icons/side-bar/userVoice.svg')}}" />
                            <span class="ml-2 nav-link-text">{{__('userVoice.nav.main')}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ $parentSection == 'notice' ? 'active' : '' }}">
                        <a class="nav-link " href="{{route('admin.notices.index')}}" aria-expanded="{{ $parentSection == 'notice' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <img src="{{asset('admin/img/icons/side-bar/notice.svg')}}" />
                            <span class="ml-2 nav-link-text">{{__('notice.nav.main')}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ $parentSection == 'collection' ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="#navbar-collection" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'collection' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.12869 4.17542H0.705876C0.315983 4.17542 0 3.85923 0 3.46955C0 3.07987 0.315983 2.76367 0.705876 2.76367H5.12869C5.51859 2.76367 5.83457 3.07987 5.83457 3.46955C5.83457 3.85923 5.51859 4.17542 5.12869 4.17542Z" fill="#212C5D" />
                                <path d="M7.65609 6.70292C5.87321 6.70292 4.42282 5.25253 4.42282 3.46981C4.42282 1.68672 5.87321 0.236328 7.65609 0.236328C9.43897 0.236328 10.8894 1.68672 10.8894 3.46981C10.8894 5.25258 9.43897 6.70292 7.65609 6.70292ZM7.65609 1.64813C6.65168 1.64813 5.83457 2.4654 5.83457 3.46981C5.83457 4.47421 6.65168 5.29111 7.65609 5.29111C8.6605 5.29111 9.47761 4.47421 9.47761 3.46981C9.47761 2.4654 8.6605 1.64813 7.65609 1.64813Z" fill="#212C5D" />
                                <path d="M23.2941 4.17542H12.7441C12.3542 4.17542 12.0382 3.85923 12.0382 3.46955C12.0382 3.07987 12.3542 2.76367 12.7441 2.76367H23.2941C23.684 2.76367 24 3.07987 24 3.46955C24 3.85923 23.684 4.17542 23.2941 4.17542Z" fill="#212C5D" />
                                <path d="M17.1336 15.2328C15.3507 15.2328 13.9004 13.7824 13.9004 11.9997C13.9004 10.217 15.3508 8.7666 17.1336 8.7666C18.9165 8.7666 20.3669 10.217 20.3669 11.9997C20.3669 13.7824 18.9166 15.2328 17.1336 15.2328ZM17.1336 10.1784C16.1292 10.1784 15.3121 10.9953 15.3121 11.9997C15.3121 13.0041 16.1292 13.821 17.1336 13.821C18.138 13.821 18.9551 13.0041 18.9551 11.9997C18.9551 10.9953 18.138 10.1784 17.1336 10.1784Z" fill="#212C5D" />
                                <path d="M12.0458 12.7057H0.705876C0.315983 12.7057 0 12.3895 0 11.9998C0 11.6101 0.315983 11.2939 0.705876 11.2939H12.0458C12.4357 11.2939 12.7517 11.6101 12.7517 11.9998C12.7517 12.3895 12.4357 12.7057 12.0458 12.7057Z" fill="#212C5D" />
                                <path d="M23.2941 12.7057H19.661C19.2711 12.7057 18.9552 12.3895 18.9552 11.9998C18.9552 11.6101 19.2711 11.2939 19.661 11.2939H23.2941C23.684 11.2939 24 11.6101 24 11.9998C24 12.3895 23.684 12.7057 23.2941 12.7057Z" fill="#212C5D" />
                                <path d="M6.86637 23.7625C5.08349 23.7625 3.6331 22.3121 3.6331 20.529C3.6331 18.7463 5.08349 17.2959 6.86637 17.2959C8.64925 17.2959 10.0996 18.7463 10.0996 20.529C10.0996 22.3121 8.64925 23.7625 6.86637 23.7625ZM6.86637 18.7077C5.86196 18.7077 5.04485 19.5246 5.04485 20.529C5.04485 21.5334 5.86196 22.3507 6.86637 22.3507C7.87078 22.3507 8.68789 21.5334 8.68789 20.529C8.68789 19.5246 7.87078 18.7077 6.86637 18.7077Z" fill="#212C5D" />
                                <path d="M23.2941 21.235H11.9542C11.5643 21.235 11.2483 20.9188 11.2483 20.5291C11.2483 20.1394 11.5643 19.8232 11.9542 19.8232H23.2941C23.684 19.8232 24 20.1394 24 20.5291C24 20.9188 23.684 21.235 23.2941 21.235Z" fill="#212C5D" />
                                <path d="M4.33897 21.235H0.705876C0.315983 21.235 0 20.9189 0 20.5291C0 20.1394 0.315983 19.8232 0.705876 19.8232H4.33897C4.72887 19.8232 5.04485 20.1394 5.04485 20.5291C5.04485 20.9189 4.72887 21.235 4.33897 21.235Z" fill="#212C5D" />
                            </svg>

                            <span class="nav-link-text pl-2">{{__('collection.nav.main')}}</span>
                        </a>
                        <div class="collapse {{ in_array($parentSection,['collection','job-categories']) ? 'show' : '' }}" id="navbar-collection">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{$elementName}} {{ $elementName == 'collection' ? 'active' : '' }}">
                                    <a href="{{ route('admin.collection.index') }}" class="nav-link">{{__('collection.nav.collection')}}</a>
                                </li>
                                <li class="nav-item {{$elementName}} {{ $elementName == 'job-categories' ? 'active' : '' }}">
                                    <a href="{{ route('admin.job-categories.index') }}" class="nav-link">{{__('job_category.nav')}}</a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{$elementName}} {{ $elementName == 'feature' ? 'active' : '' }}">
                                    <a href="{{ route('admin.features.index') }}" class="nav-link">{{__('feature.nav.main')}}</a>
                                </li>
                                <li class="nav-item {{$elementName}} {{ $elementName == 'category' ? 'active' : '' }}">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link">{{__('category.nav.main')}}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
