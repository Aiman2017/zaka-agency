@php
    $locale = app()->getLocale();
    $isRtl  = in_array($locale, ['ar']);
    $dir    = $isRtl ? 'rtl' : 'ltr';
    $bootstrapCss = $isRtl
        ? 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css'
        : 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Zaka-agency') }} — {{ $title ?? '' }}</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ $bootstrapCss }}">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #1a6fc4;
            --primary-dark: #0f4f96;
            --secondary: #c9aa71;
            --dark: #0d1b2a;
        }

        body {
            font-family: 'Inter', 'Cairo', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--dark);
            overflow: hidden;
            position: relative;
        }

        /* ── Animated gradient background ── */
        .auth-bg {
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

        /* ── Floating orbs ── */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.18;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }
        .orb-1 { width: 500px; height: 500px; background: #1a6fc4; top: -100px; left: -100px; animation-delay: 0s; }
        .orb-2 { width: 400px; height: 400px; background: #c9aa71; bottom: -80px; right: -80px; animation-delay: -4s; }
        .orb-3 { width: 300px; height: 300px; background: #0f3460; top: 50%; left: 50%; transform: translate(-50%,-50%); animation-delay: -2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-30px) scale(1.05); }
        }

        /* ── Auth card wrapper ── */
        .auth-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 1.5rem;
            animation: slideUp .5s cubic-bezier(.16,1,.3,1) both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Glass card ── */
        .auth-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            box-shadow: 0 25px 60px rgba(0,0,0,.5), 0 0 0 1px rgba(255,255,255,.04) inset;
        }

        /* ── Brand ── */
        .auth-brand {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-brand .logo-icon {
            width: 56px; height: 56px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem; color: var(--secondary);
            box-shadow: 0 8px 24px rgba(0,0,0,.2);
        }
        .auth-brand .brand-name {
            font-size: 1.6rem; font-weight: 800; color: #fff;
            letter-spacing: -0.5px;
        }
        .auth-brand .brand-name span {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .auth-brand .brand-subtitle {
            font-size: .85rem; color: rgba(255,255,255,.55); margin-top: 4px;
        }

        /* ── Form heading ── */
        .auth-heading {
            font-size: 1.3rem; font-weight: 700; color: #fff;
            margin-bottom: 1.5rem; text-align: center;
        }

        /* ── Form controls ── */
        .form-group { margin-bottom: 1.1rem; }
        .form-label {
            display: block; font-size: .8rem; font-weight: 600;
            color: rgba(255,255,255,.7); margin-bottom: 6px; letter-spacing: .4px;
            text-transform: uppercase;
        }
        .input-wrap {
            position: relative;
        }
        .input-wrap .input-icon {
            position: absolute;
            top: 50%; transform: translateY(-50%);
            color: rgba(255,255,255,.35);
            font-size: 1rem;
            pointer-events: none;
        }
        [dir="ltr"] .input-wrap .input-icon { left: 14px; }
        [dir="rtl"] .input-wrap .input-icon { right: 14px; }

        .form-control-auth {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.13);
            border-radius: 12px;
            color: #fff;
            font-size: .95rem;
            padding: 0.7rem 1rem;
            transition: border-color .2s, background .2s, box-shadow .2s;
            outline: none;
        }
        [dir="ltr"] .form-control-auth { padding-left: 2.6rem; }
        [dir="rtl"] .form-control-auth { padding-right: 2.6rem; }

        .form-control-auth::placeholder { color: rgba(255,255,255,.28); }
        .form-control-auth:focus {
            border-color: var(--primary);
            background: rgba(26,111,196,0.12);
            box-shadow: 0 0 0 3px rgba(26,111,196,.25);
        }
        .form-control-auth:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 40px #162840 inset !important;
            -webkit-text-fill-color: #fff !important;
        }

        /* toggle password eye */
        .eye-toggle {
            position: absolute;
            top: 50%; transform: translateY(-50%);
            background: none; border: none; cursor: pointer;
            color: rgba(255,255,255,.35); font-size: 1rem; padding: 4px;
            transition: color .2s;
        }
        [dir="ltr"] .eye-toggle { right: 12px; }
        [dir="rtl"] .eye-toggle { left: 12px; }
        .eye-toggle:hover { color: rgba(255,255,255,.7); }

        /* ── Error text ── */
        .field-error { font-size: .78rem; color: #f87171; margin-top: 4px; }

        /* ── Checkbox row ── */
        .check-row {
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 1.2rem;
        }
        .check-row input[type="checkbox"] {
            width: 16px; height: 16px; accent-color: var(--primary);
            cursor: pointer; border-radius: 4px;
        }
        .check-row label { font-size: .85rem; color: rgba(255,255,255,.6); cursor: pointer; }

        /* ── Submit button ── */
        .btn-auth {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), #0f4f96);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 1rem; font-weight: 700;
            padding: 0.8rem;
            cursor: pointer;
            transition: opacity .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 6px 20px rgba(26,111,196,.45);
            letter-spacing: .3px;
            margin-top: .25rem;
        }
        .btn-auth:hover {
            opacity: .9; transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(26,111,196,.55);
        }
        .btn-auth:active { transform: translateY(0); }

        /* ── Bottom link ── */
        .auth-footer-link {
            text-align: center; margin-top: 1.5rem;
            font-size: .85rem; color: rgba(255,255,255,.5);
        }
        .auth-footer-link a {
            color: var(--secondary); font-weight: 600; text-decoration: none;
            transition: color .2s;
        }
        .auth-footer-link a:hover { color: #fff; }

        /* ── Session status ── */
        .session-status {
            background: rgba(34,197,94,.15);
            border: 1px solid rgba(34,197,94,.3);
            border-radius: 10px;
            color: #86efac;
            font-size: .85rem;
            padding: .6rem .9rem;
            margin-bottom: 1.2rem;
        }

        /* ── Divider ── */
        .auth-divider {
            display: flex; align-items: center; gap: 12px;
            color: rgba(255,255,255,.25); font-size: .78rem;
            margin: 1.2rem 0;
        }
        .auth-divider::before, .auth-divider::after {
            content: ''; flex: 1;
            border-top: 1px solid rgba(255,255,255,.1);
        }

        /* ── Forgot link ── */
        .forgot-link {
            font-size: .8rem; color: rgba(255,255,255,.45);
            text-decoration: none; transition: color .2s; float: right;
        }
        [dir="rtl"] .forgot-link { float: left; }
        .forgot-link:hover { color: var(--secondary); }
    </style>
</head>
<body>
    <div class="auth-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="auth-wrapper">
        <!-- Brand -->
        <div class="auth-brand">
            <div class="logo-icon"><i class="bi bi-compass"></i></div>
            <div class="brand-name">Zaka-<span>agency</span></div>
            <div class="brand-subtitle">{{ __('Your Global Education Hub') }}</div>
        </div>

        <!-- Card -->
        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle
        document.querySelectorAll('.eye-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const inp = btn.closest('.input-wrap').querySelector('input');
                const icon = btn.querySelector('i');
                if (inp.type === 'password') {
                    inp.type = 'text';
                    icon.classList.replace('bi-eye', 'bi-eye-slash');
                } else {
                    inp.type = 'password';
                    icon.classList.replace('bi-eye-slash', 'bi-eye');
                }
            });
        });
    </script>
</body>
</html>
