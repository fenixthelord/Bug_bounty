<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <div class="brand-logo"><img class="logo" src="{{ asset('app-assets/images/logo/logo.png') }}" /></div>
                    <h2 class="brand-text mb-0">{{ config('app.name') }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class="nav-item">
                <a href="#"><i class="bx bx-book"></i><span class="menu-title">الاختصاصات</span></a>
                <ul class="menu-content">
                 <li>
                  <a href="{{ route('specializations') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
                 <li>
                  <a href="{{ route('specializations.create') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">اضافة </span></a>
                 </li>
                </ul>
               </li>
               <br>
               <li class="nav-item">
                <a href="#"><i class="bx bx-trash"></i><span class="menu-title">المحذوفات</span></a>
                <ul class="menu-content">
                 <li>
                  <a href="{{ route('trashed.index') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">استعراض</span></a></li>
</li>
</ul>


        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
        <li class="nav-item">
    
    <a href="#"><i class="bx bx-user"></i><span class="menu-title">Researcher </span></a>
    <ul class="menu-content">
     <li>
      <a href="{{ route('index.researcher') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item">show</span></a></li>


        </ul>
    </div>
</div>
<!-- END: Main Menu-->
