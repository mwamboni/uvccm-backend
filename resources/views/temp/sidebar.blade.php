<nav id="mainnav-container" class="mainnav">
    <div class="mainnav__inner">

        <!-- Navigation menu -->
        <div class="mainnav__top-content scrollable-content pb-5">


            <!-- Profile Widget -->
            <div id="_dm-mainnavProfile" class="mainnav__widget my-3 hv-outline-parent">

                <!-- Profile picture  -->
                <div class="mininav-toggle text-center py-2">
                    <img class="mainnav__avatar img-md rounded-circle hv-oc"
                        src="assets/img/profile-photos/1.png" alt="Profile Picture">
                </div>


                <div class="mininav-content collapse d-mn-max">
                    <span data-popper-arrow class="arrow"></span>
                    <div class="d-grid">

                        <!-- User name and position -->
                        <button class="mainnav-widget-toggle d-block btn border-0 p-2"
                            data-bs-toggle="collapse">
                            <span class="dropdown-toggle d-flex justify-content-center align-items-center">
                                <h5 class="mb-0 me-3">Aaron Chavez</h5>
                            </span>
                            <small class="text-body-secondary">Administrator</small>
                        </button>


                        <!-- Collapsed user menu -->
                        {{-- <div id="usernav" class="nav flex-column collapse">
                            <a href="#"
                                class="nav-link d-flex justify-content-between align-items-center">
                                <span><i class="demo-pli-mail fs-5 me-2"></i><span
                                        class="ms-1">Messages</span></span>
                                <span class="badge bg-danger rounded-pill">14</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="demo-pli-male fs-5 me-2"></i>
                                <span class="ms-1">Profile</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="demo-pli-gear fs-5 me-2"></i>
                                <span class="ms-1">Settings</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="demo-pli-computer-secure fs-5 me-2"></i>
                                <span class="ms-1">Lock screen</span>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="demo-pli-unlock fs-5 me-2"></i>
                                <span class="ms-1">Logout</span>
                            </a>
                        </div> --}}

                    </div>
                </div>

            </div>
            <!-- End - Profile widget -->


            <!-- Navigation Category -->
            <div class="mainnav__categoriy py-3">
                <h6 class="mainnav__caption mt-0 fw-bold">Navigation</h6>
                <ul class="mainnav__menu nav flex-column">

                    <!-- Link with submenu -->
                    <li class="nav-item has-sub">


                        <a href="#" class="mininav-toggle nav-link active collapsed"><i class="demo-pli-home fs-5 me-2"></i>
                            <span class="nav-label ms-1">Dashboard</span>
                        </a>

                        <!-- Dashboard submenu list -->
                        {{-- <ul class="mininav-content nav collapse">
                            <li data-popper-arrow class="arrow"></li>
                            <li class="nav-item">
                                <a href="index.html" class="nav-link active">Dashboard 1</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-2/index.html" class="nav-link">Dashboard 2</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-3/index.html" class="nav-link">Dashboard 3</a>
                            </li>

                        </ul> --}}
                        <!-- END : Dashboard submenu list -->

                    </li>
                    <!-- END : Link with submenu -->

                    <!-- Link with submenu -->
                    <li class="nav-item has-sub">


                        <a href="#" class="mininav-toggle nav-link collapsed"><i
                                class="demo-pli-split-vertical-2 fs-5 me-2"></i>
                            <span class="nav-label ms-1">Layouts</span>
                        </a>

                        <!-- Layouts submenu list -->
                        <ul class="mininav-content nav collapse">
                            <li data-popper-arrow class="arrow"></li>
                            <li class="nav-item">
                                <a href="layouts/minimal-navigation/index.html" class="nav-link">Mini
                                    Navigation</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/push-navigation/index.html" class="nav-link">Push
                                    Navigation</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/slide-navigation/index.html" class="nav-link">Slide
                                    Navigation</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/reveal-navigation/index.html" class="nav-link">Reveal
                                    Navigation</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/stuck-sidebar/index.html" class="nav-link">Stuck Sidebar</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/pinned-sidebar/index.html" class="nav-link">Pinned
                                    Sidebar</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/unite-sidebar/index.html" class="nav-link">Unite Sidebar</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/sticky-header/index.html" class="nav-link">Sticky Header</a>
                            </li>
                            <li class="nav-item">
                                <a href="layouts/sticky-navigation/index.html" class="nav-link">Sticky
                                    Navigation</a>
                            </li>

                        </ul>
                        <!-- END : Layouts submenu list -->

                    </li>
                    <!-- END : Link with submenu -->

                    <!-- Regular menu link -->
                    <li class="nav-item">
                        <a href="widgets/index.html" class="nav-link mininav-toggle"><i
                                class="demo-pli-gear fs-5 me-2"></i>

                            <span class="nav-label mininav-content ms-1">
                                <span data-popper-arrow class="arrow"></span>
                                Widgets
                            </span>
                        </a>
                    </li>
                    <!-- END : Regular menu link -->
                </ul>
            </div>
            <!-- END : Navigation Category -->
        </div>
        <!-- End - Navigation menu -->


        <!-- Bottom navigation menu -->
        <div class="mainnav__bottom-content border-top pb-2">
            <ul id="mainnav" class="mainnav__menu nav flex-column">
                <li class="nav-item has-sub">
                    <a href="#" class="nav-link mininav-toggle collapsed" aria-expanded="false">
                        <i class="demo-pli-unlock fs-5 me-2"></i>
                        <span class="nav-label ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End - Bottom navigation menu -->


    </div>
</nav>
