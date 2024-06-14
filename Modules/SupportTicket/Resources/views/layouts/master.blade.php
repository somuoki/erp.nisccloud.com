@php
    $workspace = \App\Models\WorkSpace::where('slug', request()->route()->parameters['slug'])->first();
    $admin_settings = getAdminAllSetting();
    $company_settings = getCompanyAllSetting($workspace->created_by , $workspace->id);
    $favicon = isset($company_settings['favicon']) ? $company_settings['favicon'] : (isset($admin_settings['favicon']) ? $admin_settings['favicon'] : 'uploads/logo/favicon.png');
    $rtl = isset($company_settings['site_rtl']) ? $company_settings['site_rtl'] : (isset($admin_settings['site_rtl']) ? $admin_settings['site_rtl'] : 'off');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ env('SITE_RTL') == 'on' ? 'rtl' : '' }}">

<head>

    <title>@yield('page-title') |
        {{ !empty($company_settings['title_text']) ? $company_settings['title_text'] : (!empty($admin_settings['title_text']) ? $admin_settings['title_text'] : 'WorkDo') }}
    </title>
    <meta name="title"
        content="{{ !empty($admin_settings['meta_title']) ? $admin_settings['meta_title'] : 'Nisc ERP' }}">
    <meta name="keywords"
        content="{{ !empty($admin_settings['meta_keywords']) ? $admin_settings['meta_keywords'] : 'Nisc ERP,SaaS solution,Multi-workspace' }}">
    <meta name="description"
        content="{{ !empty($admin_settings['meta_description']) ? $admin_settings['meta_description'] : 'Discover the efficiency of Dash, a user-friendly web application by Nisc ERP.' }}">
    <!-- Open Graph / Facebook -->

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title"
        content="{{ !empty($admin_settings['meta_title']) ? $admin_settings['meta_title'] : 'Nisc ERP' }}">
    <meta property="og:description"
        content="{{ !empty($admin_settings['meta_description']) ? $admin_settings['meta_description'] : 'Discover the efficiency of Dash, a user-friendly web application by Nisc ERP.' }} ">
    <meta property="og:image"
        content="{{ get_file(!empty($admin_settings['meta_image']) ? (check_file($admin_settings['meta_image']) ? $admin_settings['meta_image'] : 'uploads/meta/meta_image.png') : 'uploads/meta/meta_image.png') }}{{ '?' . time() }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title"
        content="{{ !empty($admin_settings['meta_title']) ? $admin_settings['meta_title'] : 'Nisc ERP' }}">
    <meta property="twitter:description"
        content="{{ !empty($admin_settings['meta_description']) ? $admin_settings['meta_description'] : 'Discover the efficiency of Dash, a user-friendly web application by Nisc ERP.' }} ">
    <meta property="twitter:image"
        content="{{ get_file(!empty($admin_settings['meta_image']) ? (check_file($admin_settings['meta_image']) ? $admin_settings['meta_image'] : 'uploads/meta/meta_image.png') : 'uploads/meta/meta_image.png') }}{{ '?' . time() }}">

    <meta name="author" content="nisccloud.com">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon"
    href="{{ check_file($favicon) ? get_file($favicon) : get_file('uploads/logo/favicon.png') }}{{ '?' . time() }}"
    type="image/x-icon" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">
    <link href="{{  asset('assets/js/plugins/summernote-0.8.18-dist/summernote-lite.min.css')  }}" rel="stylesheet">


</head>

<body class="{{ !empty(company_setting('color',$workspace->created_by, $workspace->id)) ? company_setting('color',$workspace->created_by, $workspace->id) : 'theme-1' }}">
    @yield('content')
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"> </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/theme.js') }}"></script> --}}
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/tinymce/tinymce.min.js') }}"></script>
    @if ($message = Session::get('success'))
        <script>
            toastrs('Success', '{!! $message !!}', 'success');
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            toastrs('Error', '{!! $message !!}', 'error');
        </script>
    @endif
    @stack('script')
    @if(admin_setting('enable_cookie') == 'on')
    @include('layouts.cookie_consent')
@endif
</body>

</html>

