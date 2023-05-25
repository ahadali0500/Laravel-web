<!DOCTYPE html>
<html lang="en">
<head>
 @include('user.layout.links')
</head>
<body>
@include('user.layout.navbar')
@yield('body')

@include('user.layout.footer')
@include('user.layout.scripts')
</body>
</html>