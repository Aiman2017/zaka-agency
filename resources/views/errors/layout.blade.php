@php
    $locale = app()->getLocale();
    $isRtl  = in_array($locale, ['ar']);
    $dir    = $isRtl ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="robots" content="noindex, nofollow"/>
<title>@yield('error_code') – @yield('error_title') | Zaka-Agency</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet"/>
<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --primary: #1a6fc4;
        --primary-dark: #0f4f96;
        --secondary: #c9aa71;
        --dark: #0d1b2a;
        --dark-2: #0f3460;
    }

    body {
        font-family: 'Inter', 'Cairo', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: var(--dark);
        color: #fff;
        overflow: hidden;
        position: relative;
        padding: 2rem;
        text-align: center;
    }

    /* Animated gradient background */
    .error-bg {
        position: fixed;
        inset: 0;
        background: linear-gradient(135deg, #0d1b2a 0%, #0f3460 40%, #1a6fc4 70%, #0d1b2a 100%);
        background-size: 400% 400%;
        animation: bgShift 12s ease infinite;
        z-index: 0;
    }
    @keyframes bgShift {
        0%   { background-position: 0% 50%; }
        50%  { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Floating orbs */
    .orb {
        position: fixed;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.15;
        animation: floatOrb 8s ease-in-out infinite;
        pointer-events: none;
        z-index: 0;
    }
    .orb-1 { width: 500px; height: 500px; background: #1a6fc4; top: -150px; left: -150px; animation-delay: 0s; }
    .orb-2 { width: 400px; height: 400px; background: #c9aa71; bottom: -100px; right: -100px; animation-delay: -4s; }
    .orb-3 { width: 300px; height: 300px; background: #0f3460; top: 50%; left: 50%; transform: translate(-50%,-50%); animation-delay: -2s; }
    @keyframes floatOrb {
        0%, 100% { transform: translateY(0) scale(1); }
        50%       { transform: translateY(-30px) scale(1.05); }
    }

    /* Content */
    .error-content {
        position: relative;
        z-index: 10;
        max-width: 600px;
        width: 100%;
        animation: slideUp .6s cubic-bezier(.16,1,.3,1) both;
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(40px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* Error code */
    .error-code {
        font-size: clamp(7rem, 20vw, 12rem);
        font-weight: 900;
        line-height: 1;
        letter-spacing: -6px;
        background: linear-gradient(135deg, #fff 30%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        text-shadow: none;
    }

    /* Icon */
    .error-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        display: block;
    }

    /* Title */
    .error-title {
        font-size: clamp(1.4rem, 4vw, 2rem);
        font-weight: 800;
        color: #fff;
        margin-bottom: 1rem;
    }

    /* Message */
    .error-message {
        font-size: 1rem;
        color: rgba(255,255,255,.65);
        line-height: 1.75;
        max-width: 480px;
        margin: 0 auto 2rem;
    }

    /* Divider */
    .error-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border-radius: 4px;
        margin: 1rem auto 1.5rem;
    }

    /* Buttons */
    .btn-home {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: #fff;
        padding: 0.85rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        transition: opacity .2s, transform .15s, box-shadow .2s;
        box-shadow: 0 6px 20px rgba(26,111,196,.45);
        letter-spacing: .3px;
    }
    .btn-home:hover {
        opacity: .9;
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(26,111,196,.55);
        color: #fff;
        text-decoration: none;
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: rgba(255,255,255,.65);
        padding: 0.85rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: .95rem;
        text-decoration: none;
        border: 1px solid rgba(255,255,255,.15);
        transition: color .2s, border-color .2s, transform .15s;
    }
    .btn-back:hover {
        color: #fff;
        border-color: rgba(255,255,255,.35);
        transform: translateY(-2px);
        text-decoration: none;
    }
    .btn-group {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* Brand */
    .error-brand {
        position: fixed;
        top: 1.5rem;
        {{ $isRtl ? 'right' : 'left' }}: 2rem;
        z-index: 20;
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }
    .error-brand .brand-icon {
        font-size: 1.5rem;
        color: var(--secondary);
    }
    .error-brand .brand-name {
        font-size: 1.3rem;
        font-weight: 800;
        color: #fff;
    }
    .error-brand .brand-name span {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
</head>
<body>
<div class="error-bg"></div>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>
<div class="orb orb-3"></div>

{{-- Brand --}}
<a href="{{ url('/') }}" class="error-brand" aria-label="Zaka-Agency Home">
    <span class="brand-icon">&#9685;</span>
    <span class="brand-name">Zaka-<span>agency</span></span>
</a>

<div class="error-content">
    <div class="error-code">@yield('error_code')</div>
    <div class="error-divider"></div>
    <h1 class="error-title">@yield('error_title')</h1>
    <p class="error-message">@yield('error_message')</p>
    <div class="btn-group">
        <a href="{{ url('/') }}" class="btn-home">
            &#8962; {{ __('Go to Homepage') }}
        </a>
        <a href="{{ url('/') }}" class="btn-back">
            &#8592; {{ __('Go Back') }}
        </a>
    </div>
</div>
</body>
</html>
