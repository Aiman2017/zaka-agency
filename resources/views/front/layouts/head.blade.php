@php
    $locale    = app()->getLocale();
    $isRtl     = in_array($locale, ['ar']);
    $dir       = $isRtl ? 'rtl' : 'ltr';
    $bootstrapCss = $isRtl
        ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
        : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>{{ __('Zaka-agency – Helping Students Start Their Journey Abroad') }}</title>
<meta name="description" content="{{ __('Zaka-agency helps international students with university admissions, airport pickup, and accommodation support in 12+ countries.') }}"/>
<link rel="stylesheet" href="{{ $bootstrapCss }}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"/>
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}"/>
</head>
<body>