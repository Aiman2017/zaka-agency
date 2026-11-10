@include('front.layouts.head')

<!-- NAVBAR -->

@include('front.layouts.nav')


@yield('content')
<!-- FOOTER -->
@include('front.layouts.footer')

<script defer src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script defer src="{{ asset('assets/js/main.js') }}?v=2.0"></script>
</body>

</html>
