<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  
  @stack('head-style')
  @include('admin.layouts.style')
  @stack('end-style')
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      {{-- navbar --}}
      @include('front.dashboard.layouts.navbar')

      @include('front.dashboard.layouts.topbar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
    </div>
  </div>

  @stack('head-script')
  @include('admin.layouts.script')
  @stack('end-script')
</body>
</html>
