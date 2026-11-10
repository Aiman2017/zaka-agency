@php
    $locale = app()->getLocale();
    $isRtl = in_array($locale, ['ar']);
    $dir = $isRtl ? 'rtl' : 'ltr';
    $bootstrapCss = asset('assets/vendor/bootstrap/' . ($isRtl ? 'bootstrap.rtl.min.css' : 'bootstrap.min.css'));
    $appName = 'Zaka-Agency';
    $ogLocales = ['ru' => 'ru_RU', 'en' => 'en_US', 'ar' => 'ar_AR', 'fr' => 'fr_FR'];
    $supported = array_keys(LaravelLocalization::getSupportedLocales());

    // Blog articles are written in Arabic only: the Arabic URL is the canonical one,
    // and the other language copies point to it so they are not treated as duplicates.
    $isBlogPost = request()->routeIs('front.blog.show');
    $canonicalLocale = $isBlogPost ? 'ar' : $locale;
    $canonicalUrl = LaravelLocalization::getLocalizedURL($canonicalLocale, null, [], true) ?: url()->current();
    $hreflangLocales = $isBlogPost ? ['ar'] : $supported;

    $defaultTitle = __('Zaka-Agency – Helping Students Start Their Journey Abroad');
    $defaultDesc = __(
        'Zaka-Agency helps international students with university admissions, airport pickup, and accommodation support in 12+ countries.',
    );
    $ogImage = asset('assets/images/og-image.jpg');
    $v = '2.0';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}" data-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#07080c" />
    <meta name="robots" content="index, follow, max-image-preview:large" />
    <meta name="google-site-verification" content="31FTfBItUHNYB7uo9ONy1OWUI2nUomidWcvKqJ5rl2c" />

    {{-- ── Title & Description ── --}}
    <title>@yield('seo_title', $defaultTitle)</title>
    <meta name="description" content="@yield('seo_description', $defaultDesc)" />

    {{-- ── Canonical + hreflang (all language versions, x-default = Russian) ── --}}
    <link rel="canonical" href="{{ $canonicalUrl }}" />
    @foreach ($hreflangLocales as $loc)
        <link rel="alternate" hreflang="{{ $loc }}"
            href="{{ LaravelLocalization::getLocalizedURL($loc, null, [], true) }}" />
    @endforeach
    @unless ($isBlogPost)
        <link rel="alternate" hreflang="x-default"
            href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}" />
    @endunless

    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('site.webmanifest') }}" />

    {{-- ── Open Graph / Twitter ── --}}
    <meta property="og:type" content="@yield('og_type', 'website')" />
    <meta property="og:url" content="{{ $canonicalUrl }}" />
    <meta property="og:site_name" content="{{ $appName }}" />
    <meta property="og:title" content="@yield('seo_title', $defaultTitle)" />
    <meta property="og:description" content="@yield('seo_description', $defaultDesc)" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:locale" content="{{ $ogLocales[$locale] ?? $locale }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('seo_title', $defaultTitle)" />
    <meta name="twitter:description" content="@yield('seo_description', $defaultDesc)" />
    <meta name="twitter:image" content="{{ $ogImage }}" />

    {{-- ── JSON-LD: Organization (all pages) ── --}}
    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'EducationalOrganization',
    'name' => $appName,
    'url' => url('/' . $locale),
    'logo' => asset('assets/images/logo.jpeg'),
    'description' => $defaultDesc,
    'inLanguage' => $locale,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
    @stack('json_ld')

    {{-- ── Self-hosted assets (no third-party CDN: works reliably inside Russia) ── --}}
    <link rel="preload" as="font" type="font/woff2" crossorigin
        href="{{ asset('assets/vendor/fonts/' . ($isRtl ? 'cairo-arabic-600-normal.woff2' : 'playfair-display-' . ($locale === 'ru' ? 'cyrillic' : 'latin') . '-600-normal.woff2')) }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts.css') }}?v={{ $v }}" />
    <link rel="stylesheet" href="{{ $bootstrapCss }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/icons/bootstrap-icons.min.css') }}?v={{ $v }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/luxe.css') }}?v={{ $v }}" />

    @vite(['resources/css/front.css', 'resources/js/app.js'])
</head>

<body>
