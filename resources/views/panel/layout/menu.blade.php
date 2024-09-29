<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo"><img class="logo" src="{{ asset('app-assets/images/logo/logo.png') }}" /></div>
                    <h2 class="brand-text mb-0">Bug Bounty</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block danger" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" navigation-header"><span>الشركات</span>
            </li>
            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title" data-i18n="Dashboard">الشركات</span><span class="badge badge-light-danger badge-pill badge-round float-right mr-2">1</span></a>
                <ul class="menu-content">
                    <li class="active"><a href="{{route('admin.company')}}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="eCommerce">عرض الشركات</span></a>
                    </li>

                </ul>
               </li>


        </ul>
        
    </div>
</div>
<!-- END: Main Menu-->
