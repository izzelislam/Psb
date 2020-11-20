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

<body>
  <div id="app">
    <div class="main-wrapper">
      <!-- navbar -->
      @include('admin.layouts.navbar')
      <!-- sidebar -->
      @include('admin.layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title-page')</h1>
            @yield('bread-crumb')
          </div>

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
