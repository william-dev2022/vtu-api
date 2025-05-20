<div class="px-0 container-fluid" data-layout="container">
    <nav class="navbar navbar-vertical navbar-expand-lg">
        <script>
            var navbarStyle = window.config.config.phoenixNavbarStyle;
            if (navbarStyle && navbarStyle !== 'transparent') {
                document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
            }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <!-- scrollbar removed-->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <!-- parent pages-->
                        <div class="nav-item-wrapper">
                            <a class="nav-link active label-1" href="/" role="button" data-bs-toggle=""
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span data-feather="pie-chart">
                                        </span>
                                    </span>
                                    <span class="nav-link-text-wrapper"><span
                                            class="nav-link-text">Dashboard</span></span>
                                </div>
                            </a>
                        </div><!-- parent pages-->
                    </li>

                    <li class="nav-item">
                        <!-- label-->
                        <p class="navbar-vertical-label">Contest</p>
                        <hr class="navbar-vertical-line" /><!-- parent pages-->

                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="" role="button" data-bs-toggle=""
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span data-feather="pie-chart">
                                        </span>
                                    </span>
                                    <span class="nav-link-text-wrapper"><span
                                            class="nav-link-text">Contest</span></span>
                                </div>
                            </a>
                            <a class="nav-link label-1" href="{{route('contest.create')}}" role="button" data-bs-toggle=""
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span data-feather="pie-chart">
                                        </span>
                                    </span>
                                    <span class="nav-link-text-wrapper"><span
                                            class="nav-link-text">Create Contest</span></span>
                                </div>
                            </a>
                        </div>
                        <!-- parent pages-->
                    </li>

                    <li class="nav-item">
                        <p class="navbar-vertical-label">Contest</p>
                        <hr class="navbar-vertical-line" />

                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#deposit"
                                role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="deposit">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                    </div><span class="nav-link-icon"><span data-feather="clipboard"></span></span><span
                                        class="nav-link-text">Contest</span>
                                </div>
                            </a>
                            <div class="parent-wrapper label-1">
                                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="deposit">
                                    <li class="collapsed-nav-item-title d-none">Deposit</li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Deposit</span>
                                            </div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Pending Deposit</span>
                                            </div>
                                        </a><!-- more inner pages-->
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" 
                                        href="" 
                                        data-bs-toggle=""
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text">Deposite History</span>
                                            </div>
                                        </a><!-- more inner pages-->
                                    </li>
                                </ul>
                            </div>


                        </div>

                        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#withdraw"
                                role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="withdraw">
                                <div class="d-flex align-items-center">
                                    <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span>
                                    </div><span class="nav-link-icon"><span data-feather="clipboard"></span></span><span
                                        class="nav-link-text">Withdraws</span>
                                </div>
                            </a>
                        </div>

                        <div class="parent-wrapper label-1">
                            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="withdraw">
                                <li class="collapsed-nav-item-title d-none">Withdrawals</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-bs-toggle=""
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Withdrawals</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>

                                <li class="nav-item"><a class="nav-link" href=""
                                        data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Withdrawal History</span>
                                        </div>
                                    </a><!-- more inner pages-->
                                </li>
                            </ul>
                        </div>
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="" role="button" data-bs-toggle=""
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span data-feather="pie-chart">
                                        </span>
                                    </span>
                                    <span class="nav-link-text-wrapper"><span class="nav-link-text">Bonus</span></span>
                                </div>
                            </a>
                        </div>

                    </li>

                    <li class="nav-item">
                        <!-- label-->
                        <p class="navbar-vertical-label">Actions</p>
                        <hr class="navbar-vertical-line" /><!-- parent pages-->
                        <hr class="navbar-vertical-line" />

                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="" role="button" data-bs-toggle=""
                                aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span data-feather="settings">
                                        </span>
                                    </span>
                                    <span class="nav-link-text-wrapper"><span
                                            class="nav-link-text">Settings</span></span>
                                </div>
                            </a>
                        </div>

                        <div class="nav-item-wrapper">
                            <form class="w-100" method="POST" action="">
                                @csrf
                                <a class="nav-link label-1 w-100" role="button" data-bs-toggle="" aria-expanded="false"
                                    href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span data-feather="log-out">
                                            </span>
                                        </span>

                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Logout</span>
                                        </span> <!-- Authentication -->
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="navbar-vertical-footer">
            <button
                class="border-0 btn navbar-vertical-toggle fw-semi-bold w-100 white-space-nowrap d-flex align-items-center">
                <span class="uil uil-left-arrow-to-left fs-0"></span>
                <span class="uil uil-arrow-from-right fs-0"></span>
                <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
            </button>
        </div>
    </nav>





    <nav class="navbar navbar-top navbar-expand" id="navbarDefault">
        <div class="collapse navbar-collapse justify-content-between">
            <div class="navbar-logo">
                <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                    aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                        class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand me-1 me-sm-3" href="/">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <p class="logo-text ms-2 d-none d-sm-block" style="font-size: 16px;">{{config('app.name')}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <ul class="flex-row navbar-nav navbar-nav-icons">
                <li class="nav-item">
                    <div class="px-2 theme-control-toggle fa-icon-wait"><input
                            class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                            data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label
                            class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                                data-feather="moon"></span></label><label
                            class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon"
                                data-feather="sun"></span></label></div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell"
                            style="height:20px;width:20px;"></span></a>
                    <div class="py-0 border shadow dropdown-menu dropdown-menu-end notification-dropdown-menu border-300 navbar-dropdown-caret"
                        id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                        <div class="border-0 card position-relative">
                            <div class="p-2 card-header">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 text-black">Notificatons</h5><button
                                        class="p-0 btn btn-link fs--1 fw-normal" type="button">Mark all as
                                        read</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                        role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="avatar avatar-l ">
                            <img class="rounded-circle "
                                src="{{ asset(Auth::user()?->profile_image ?? 'https://pixlok.com/wp-content/uploads/2021/03/default-user-profile-picture.jpg') }}"
                                alt="" />
                        </div>
                    </a>
                    <div class="py-0 border shadow dropdown-menu dropdown-menu-end navbar-dropdown-caret dropdown-profile border-300"
                        aria-labelledby="navbarDropdownUser">
                        <div class="border-0 card position-relative">
                            <div class="p-0 card-body">
                                <div class="pt-4 pb-3 text-center">
                                    <div class="avatar avatar-xl ">
                                        {{-- <img class="rounded-circle "
                                            src="{{ asset(Auth::user()->profile_image ?? 'https://pixlok.com/wp-content/uploads/2021/03/default-user-profile-picture.jpg') }}"
                                            alt="" /> --}}
                                    </div>
                                    {{-- <h6 class="mt-2 text-black">{{Auth::user()->firstname . ' ' .
                                        Auth::user()->lastname}}</h6> --}}
                                </div>
                            </div>
                            <div class="overflow-auto scrollbar" style="height: 10rem;">
                                <ul class="pb-1 mb-2 nav d-flex flex-column">
                                    <li class="nav-item">
                                        <a class="px-3 nav-link" 
                                        {{-- href="{{route('dashboard')}}" --}}
                                        >
                                            <span class="me-2 text-900" data-feather="pie-chart"></span>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="px-3 nav-link" 
                                        {{-- href="{{route('setting')}}" --}}
                                        > 
                                        <span
                                                class="me-2 text-900" data-feather="settings"></span>Settings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    {{-- <script>
        var navbarTopShape = window.config.config.phoenixNavbarTopShape;
      var navbarPosition = window.config.config.phoenixNavbarPosition;
      var body = document.querySelector('body');
      var navbarDefault = document.querySelector('#navbarDefault');
      var navbarTop = document.querySelector('#navbarTop');
      var topNavSlim = document.querySelector('#topNavSlim');
      var navbarTopSlim = document.querySelector('#navbarTopSlim');
      var navbarCombo = document.querySelector('#navbarCombo');
      var navbarComboSlim = document.querySelector('#navbarComboSlim');

      var documentElement = document.documentElement;
      var navbarVertical = document.querySelector('.navbar-vertical');

      if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
        navbarDefault.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        topNavSlim.style.display = 'block';
        navbarVertical.style.display = 'inline-block';
        body.classList.add('nav-slim');
      } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        navbarVertical.remove();
        navbarTop.remove();
        topNavSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarTopSlim.removeAttribute('style');
        body.classList.add('nav-slim');
      } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
        navbarDefault.remove();
        //- navbarVertical.remove();
        navbarTop.remove();
        topNavSlim.remove();
        navbarCombo.remove();
        navbarTopSlim.remove();
        navbarComboSlim.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        body.classList.add('nav-slim');
      } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
        navbarDefault.remove();
        topNavSlim.remove();
        navbarVertical.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarTop.removeAttribute('style');
        documentElement.classList.add('navbar-horizontal');
      } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
        topNavSlim.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarDefault.remove();
        navbarComboSlim.remove();
        navbarCombo.removeAttribute('style');
        navbarVertical.removeAttribute('style');
        documentElement.classList.add('navbar-combo')

      } else {
        topNavSlim.remove();
        navbarTop.remove();
        navbarTopSlim.remove();
        navbarCombo.remove();
        navbarComboSlim.remove();
        navbarDefault.removeAttribute('style');
        navbarVertical.removeAttribute('style');
      }

      var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
      var navbarTop = document.querySelector('.navbar-top');
      if (navbarTopStyle === 'darker') {
        navbarTop.classList.add('navbar-darker');
      }

      var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
      var navbarVertical = document.querySelector('.navbar-vertical');
      if (navbarVerticalStyle === 'darker') {
        navbarVertical.classList.add('navbar-darker');
      }
    </script> --}}