<!DOCTYPE html>
<html>

<head>
    @include('admin.layout.link')
</head>

<body id="bodyrefer" class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @include('admin.layout.navbar')
    @yield('body')
    @include('admin.layout.footer')
    @include('admin.layout.links')
</body>

</html>
