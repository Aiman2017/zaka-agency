@include('front.layouts.head')

<!-- NAVBAR -->

@include('front.layouts.nav')


@yield('content')
<!-- FOOTER -->
@include('front.layouts.footer')

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script defer src="{{ asset('assets/js/main.js') }}?v=1.1"></script>
</body>

</html>
