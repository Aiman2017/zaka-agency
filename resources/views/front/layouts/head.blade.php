@php
    $locale = app()->getLocale();
    $isRtl = in_array($locale, ['ar']);
    $dir = $isRtl ? 'rtl' : 'ltr';
    $bootstrapCss = $isRtl
        ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
        : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
    $canonicalUrl = url()->current();
    $appName = 'Zaka-Agency';
    $defaultTitle = __('Zaka-Agency – Helping Students Start Their Journey Abroad');
    $defaultDesc = __(
        'Zaka-Agency helps international students with university admissions, airport pickup, and accommodation support in 12+ countries.',
    );
    $ogImage = asset('assets/images/og-image.jpg');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index, follow" />
<meta name="google-site-verification" content="31FTfBItUHNYB7uo9ONy1OWUI2nUomidWcvKqJ5rl2c" />
    {{-- ── Title & Description ── --}}
    <title>@yield('seo_title', $defaultTitle)</title>
    <meta name="description" content="@yield('seo_description', $defaultDesc)" />

    {{-- ── Canonical URL ── --}}
    <link rel="canonical" href="{{ $canonicalUrl }}" />

    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
<link rel="manifest" href="{{ asset('site.webmanifest') }}" />
    
    {{-- ── Open Graph / Facebook ── --}}
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:url" content="{{ $canonicalUrl }}" />
    <meta property="og:site_name" content="{{ $appName }}" />
    <meta property="og:title" content="@yield('seo_title', $defaultTitle)" />
    <meta property="og:description" content="@yield('seo_description', $defaultDesc)" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:locale" content="{{ $locale }}" />

    {{-- ── Twitter Card ── --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('seo_title', $defaultTitle)" />
    <meta name="twitter:description" content="@yield('seo_description', $defaultDesc)" />
    <meta name="twitter:image" content="{{ $ogImage }}" />


    {{-- ── JSON-LD: Organization (base schema on all pages) ── --}}
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "EducationalOrganization",
  "name": "Zaka-Agency",
  "url": "{{ config('app.url') }}",
  "logo": "{{ asset('assets/images/logo.png') }}",
  "description": "{{ $defaultDesc }}",
  "sameAs": []
}
</script>
    {{-- ── Page-specific JSON-LD ── --}}
    @stack('json_ld')

    {{-- ── Resource hints ── --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net" />

    {{-- ── Google Fonts (non-blocking) ── --}}
    <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Cairo:wght@400;600;700&display=swap"
        onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Cairo:wght@400;600;700&display=swap" />
    </noscript>

    {{-- ── Bootstrap CSS (layout-critical, synchronous) ── --}}
    <link rel="stylesheet" href="{{ $bootstrapCss }}" />

    {{-- ── Bootstrap Icons (non-blocking) ── --}}
    <link rel="preload" as="style"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    </noscript>

    {{-- ── Flag Icons (non-blocking) ── --}}
    {{-- <link rel="preload" as="style"
        href="https://cdn.jsdelivr.net/npm/flag-icons@7.5.0/css/flag-icons.min.css"
        onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons@7.5.0/css/flag-icons.min.css" />
    </noscript> --}}

    {{-- ── Critical CSS (inline – unblocks first paint) ── --}}
    <style>
        :root {
            --primary: #1a3a6b;
            --primary-dark: #0f2347;
            --primary-light: #dbeafe;
            --secondary: #e05c00;
            --accent: #f59e0b;
            --dark: #2d3748;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-600: #6c757d;
            --white: #fff;
            --radius: 12px;
            --shadow: 0 4px 24px rgba(26, 58, 107, .12);
            --shadow-hover: 0 8px 40px rgba(26, 58, 107, .22);
            --transition: .3s ease;
            --font-en: 'Inter', sans-serif;
            --font-ar: 'Cairo', sans-serif;
            --bg-body: #f8fafc;
            --bg-surface: #fff;
            --bg-subtle: #eef2f7;
            --text-main: #0d1b2a;
            --text-muted: #6c757d;
            --border: #e9ecef;
            --navbar-bg: #fff;
            --card-bg: #fff
        }

        [data-theme="dark"] {
            --primary: #1a6fc4;
            --primary-dark: #145ca0;
            --secondary: #f4a024;
            --accent: #0dcaf0;
            --dark: #0d1b2a;
            --bg-body: #080e18;
            --bg-surface: #101c2b;
            --bg-subtle: #0c1622;
            --text-main: #f8f9fa;
            --text-muted: #a0aec0;
            --border: #2d3748;
            --navbar-bg: rgba(22, 32, 44, .85);
            --card-bg: #16202c;
            --primary-light: rgba(26, 111, 196, .25);
            --gray-100: #111922;
            --gray-200: #2d3748;
            --gray-600: #a0aec0;
            --shadow: 0 8px 32px rgba(0, 0, 0, .4);
            --shadow-hover: 0 12px 48px rgba(0, 0, 0, .6)
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: var(--font-en);
            color: var(--text-main);
            background: var(--bg-body);
            overflow-x: hidden;
            transition: background var(--transition), color var(--transition)
        }

        body[dir="rtl"] {
            font-family: var(--font-ar)
        }

        .navbar {
            background: var(--navbar-bg) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, .08);
            padding: 14px 0
        }

        .hero-section {
            min-height: 100vh;
            background: #060e1a;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px
        }

        .hero-badge {
            display: inline-block;
            background: rgba(255, 255, 255, .15);
            color: #fff;
            padding: 6px 18px;
            border-radius: 50px;
            font-size: .85rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, .2)
        }

        .hero-title {
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 20px
        }

        .hero-title span {
            color: var(--secondary)
        }

        .hero-desc {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, .8);
            line-height: 1.8;
            margin-bottom: 36px;
            max-width: 560px
        }

        .hero-btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: #fff;
            border: none;
            padding: 14px 36px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: inline-block
        }

        .hero-btn-secondary {
            background: transparent;
            color: #fff;
            border: 2px solid rgba(255, 255, 255, .4);
            padding: 12px 34px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            display: inline-block
        }
    </style>

    {{-- ── Custom CSS (non-blocking) ── --}}
    <link rel="preload" as="style" href="{{ asset('assets/css/style.css') }}?v=1.2"
        onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=1.2" />
    </noscript>

    {{-- ── Dark mode (inline – must run before first paint) ── --}}
    <script>
        (function() {
            var s = localStorage.getItem('torrist_theme'),
                p = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (s === 'dark' || (!s && p)) document.documentElement.setAttribute('data-theme', 'dark');
        })();
    </script>

    @vite(['resources/css/front.css', 'resources/js/app.js'])


</head>

<body>
