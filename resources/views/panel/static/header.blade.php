@include('panel.static.head')
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns navbar-sticky footer-static"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="2-columns"
      data-layout="semi-dark-layout"
      style="background-image: url('{{ asset('app-assets/images/pages/dark.jpg') }}');">

   <style> 
     .content-wrapper {
    padding: 20px;
    border-radius: 10px;
}
@media (max-width: 768px) {
    body {
        background-image: url('{{ asset('app-assets/images/pages/dark-small.jpg') }}');
    }
}
body {
    animation: fadeInBackground 2s ease-in-out;
}

@keyframes fadeInBackground {
    from {
        opacity: 0;
    }
    to {
        opacity: 4;
    }
}
</style>