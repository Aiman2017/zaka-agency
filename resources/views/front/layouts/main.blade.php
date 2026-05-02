@include('front.layouts.head')

<!-- Loader -->
<div id="page-loader">
    <div class="loader-spinner"></div>
</div>

<!-- NAVBAR -->

@include('front.layouts.nav')


@yield('content')
<!-- FOOTER -->
@include('front.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}?v={{ time() }}"></script>
</body>

</html>
