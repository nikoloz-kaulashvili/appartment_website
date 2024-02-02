<!DOCTYPE html>
<html class="no-js" lang="en">
    @include('website.layouts.head')
    <body>
        {{-- @include('website.layouts.preloader') --}}
        
        @include('website.layouts.header')

        @yield('content')
        @include('website.layouts.footer')

        @include('website.layouts.script')
  </body>
</html>
