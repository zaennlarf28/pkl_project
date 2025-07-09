<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
  <!-- [Head] start -->

  <head>
    <title>Home | Datta Able Dashboard Template</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Datta Able is trending dashboard template made using Bootstrap 5 design framework. Datta Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies."
    />
    <meta
      name="keywords"
      content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard"
    />
    <meta name="author" content="CodedThemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{asset('assets/backend/images/favicon.svg')}}" type="image/x-icon" />

     <!-- [Font] Family -->
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{asset('assets/backend/fonts/phosphor/duotone/style.css')}}" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{asset('assets/backend/fonts/tabler-icons.min.css')}}" />
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{asset('assets/backend/fonts/feather.css')}}" />
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{asset('assets/backend/fonts/fontawesome.css')}}" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{asset('assets/backend/fonts/material.css')}}" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}" id="main-style-link" />
    @yield('styles')
  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body>

  <!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
@include('layouts.components-backend.sidebar')
<!-- [ Sidebar Menu ] end -->
 <!-- [ Header Topbar ] start -->
@include('layouts.components-backend.navbar')
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
    <div class="pc-container">
        @yield('content')
    </div>
<!-- [ Main Content ] end -->
  <!-- Required Js -->
    <script src="{{asset('assets/backend/js/plugins/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/icon/custom-icon.js')}}"></script>
    <script src="{{asset('assets/backend/js/plugins/feather.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/component.js')}}"></script>
    <script src="{{asset('assets/backend/js/theme.js')}}"></script>
    <script src="{{asset('assets/backend/js/script.js')}}"></script>

    <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
    </div>

    
    <script>
      layout_change('false');
    </script>
     
    
    <script>
      layout_theme_sidebar_change('dark');
    </script>
    
     
    <script>
      change_box_container('false');
    </script>
     
    <script>
      layout_caption_change('true');
    </script>
     
    <script>
      layout_rtl_change('false');
    </script>
     
    <script>
      preset_change('preset-1');
    </script>
     
    <script>
      main_layout_change('vertical');
    </script>
    
    @yield('js')
    @stack('scripts')
  </body>
  <!-- [Body] end -->
</html>