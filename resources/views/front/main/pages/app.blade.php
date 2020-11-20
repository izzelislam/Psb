<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    @include('front.main.layouts.style')

    <title>@yield('title')</title>
  </head>
  <body>
    <!--navbar-->
    @include('front.main.layouts.navbar')
    <!--content  -->
    @yield('content')
    <!-- footer -->
    @include('front.main.layouts.footer')
   
    @stack('head-script')
    @include('front.main.layouts.script')
    @stack('end-script')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
  </body>
</html>
