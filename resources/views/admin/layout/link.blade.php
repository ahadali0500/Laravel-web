 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 @stack('title')
 <meta name="description"
     content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
 <meta name="keywords"
     content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
 <meta name="author" content="PIXINVENT">

 <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/logo/faicon.png') }}">
 <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/vendors/css/vendors.min.css') }}">
 <!-- END: Vendor CSS-->

 <!-- BEGIN: Theme CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/bootstrap.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/bootstrap-extended.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/colors.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/components.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/themes/dark-layout.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/css/themes/semi-dark-layout.css') }}">

 <!-- BEGIN: Page CSS-->
 <link rel="stylesheet" type="text/css"
     href="{{ asset('admin_assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
 <link rel="stylesheet" type="text/css"
     href="{{ asset('admin_assets/app-assets/css/core/colors/palette-gradient.css') }}">
 <link rel="stylesheet" type="text/css"
     href="{{ asset('admin_assets/app-assets/css/plugins/forms/validation/form-validation.css') }}">
 <!-- END: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
 <!-- BEGIN: Custom CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/style.css') }}s">
 <!-- END: Custom CSS-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
 <style>
     /* (A) FULL SCREEN WRAPPER */
     #spinner {
         position: fixed;
         top: 0;
         left: 0;
         z-index: 9999;
         width: 100vw;
         height: 100vh;
         background: rgba(0, 0, 0, 0.7);
         transition: opacity 0.2s;
     }

     /* (B) CENTER LOADING SPINNER */
     #spinner img {
         width: 70px;
         position: absolute;
         top: 50%;
         left: 50%;

     }

     /* (C) SHOW & HIDE */
     #spinner {
         visibility: hidden;
         opacity: 0;
     }

     #spinner.show {
         visibility: visible;
         opacity: 1;
     }
 </style>
 <div id="spinner">
     <img src="/loader.gif" />
 </div>
