@php
    $locale      = app()->getLocale();
    $isRtl       = in_array($locale, ['ar']);
    $dir         = $isRtl ? 'rtl' : 'ltr';
    $bootstrapCss = $isRtl
        ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
        : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
    $canonicalUrl = url()->current();
    $appName      = 'Zaka-Agency';
    $defaultTitle = __('Zaka-Agency – Helping Students Start Their Journey Abroad');
    $defaultDesc  = __('Zaka-Agency helps international students with university admissions, airport pickup, and accommodation support in 12+ countries.');
    $ogImage      = asset('assets/images/og-image.jpg');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="robots" content="index, follow"/>

{{-- ── Title & Description ── --}}
<title>@yield('seo_title', $defaultTitle)</title>
<meta name="description" content="@yield('seo_description', $defaultDesc)"/>

{{-- ── Canonical URL ── --}}
<link rel="canonical" href="{{ $canonicalUrl }}"/>

{{-- ── Open Graph / Facebook ── --}}
<meta property="og:type" content="@yield('og_type', 'website')"/>
<meta property="og:url" content="{{ $canonicalUrl }}"/>
<meta property="og:site_name" content="{{ $appName }}"/>
<meta property="og:title" content="@yield('seo_title', $defaultTitle)"/>
<meta property="og:description" content="@yield('seo_description', $defaultDesc)"/>
<meta property="og:image" content="{{ $ogImage }}"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:locale" content="{{ $locale }}"/>

{{-- ── Twitter Card ── --}}
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="@yield('seo_title', $defaultTitle)"/>
<meta name="twitter:description" content="@yield('seo_description', $defaultDesc)"/>
<meta name="twitter:image" content="{{ $ogImage }}"/>

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

{{-- ── Stylesheets ── --}}
<link rel="stylesheet" href="{{ $bootstrapCss }}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"/>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}"/>
</head>
<body>
