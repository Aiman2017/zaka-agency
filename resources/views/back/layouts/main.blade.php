@include('back.layouts.head')

  <!-- ═══════════════════════════════════════════ SIDEBAR ═══ -->
 @include('back.layouts.sidebar')

  <!-- ══════════════════════════════════════════ MAIN AREA ═══ -->
  <div id="main-wrapper" class="main-wrapper">

    <!-- ────────────────── TOPBAR ────────────────── -->
   @include('back.layouts.header')

    <!-- ────────────────── PAGE CONTENT ────────────────── -->
    <main class="page-content">
      @yield('content')
  

    </main>
    <!-- End page-content -->
  </div>
  <!-- End main-wrapper -->
@include('back.layouts.footer')
