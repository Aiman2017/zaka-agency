@php
    $locale    = LaravelLocalization::getCurrentLocale();
    $direction = LaravelLocalization::getCurrentLocaleDirection(); // 'rtl' or 'ltr'
    $isRtl     = $direction === 'rtl';
    $bootstrapCss = $isRtl
        ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
        : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $direction }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow"/>
  <title>@yield('page_title', 'Dashboard') | Zaka-Agency Admin</title>
  <meta name="description" content="Zaka-Agency Admin Dashboard."/>

  <!-- Bootstrap 5 (RTL-aware: switches automatically for AR) -->
  <link rel="stylesheet" href="{{ $bootstrapCss }}" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Flag Icons -->
  {{-- <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/flag-icons@7.5.0/css/flag-icons.min.css" /> --}}
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&family=Inter:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />

  <!-- Custom Admin CSS -->
  <link rel="stylesheet" href="{{ asset('assets/back/css/main.css') }}?v=1.0" />
  @vite(['resources/css/app.css'])
  <!-- Apply saved theme before render to prevent flash -->
  <script>(function(){var t=localStorage.getItem('admin_theme')||'light';document.documentElement.setAttribute('data-theme',t);document.documentElement.setAttribute('data-bs-theme',t);})();</script>
</head>
<body>