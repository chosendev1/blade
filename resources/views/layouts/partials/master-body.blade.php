@extends('layouts.partials.master')
    @section('body')
<body class="animsition">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	@include('layouts.partials.navbar')
	@include('layouts.partials.menubar')
	    <!-- Page -->
	<div class="page">
	    @yield('content')
	</div>
	<!-- End Page -->
	 <footer class="site-footer">
      <div class="site-footer-legal">© 2019 <a href="javascript:void(0)">Wola</a></div>
      <!-- <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by <a href="javascript:void(0)">Creation Studio</a>
      </div> -->
    </footer>
	 @endsection

