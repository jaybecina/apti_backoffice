<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('layouts.components.metas')
  @include('layouts.components.styles')
  @yield('page-styles')
</head>

@include('layouts.components.loading')
<body data-sidebar="light">


<!-- Begin page -->
<div id="layout-wrapper">

@include('layouts.components.header')
@include('layouts.components.sidebar')

<section class="content">
  @yield('content') 
</section>

</div>
<!-- END layout-wrapper -->
@yield('page-modals')
@include('layouts.components.scripts')
@yield('page-scripts')

</body>
</html>