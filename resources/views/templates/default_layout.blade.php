<!DOCTYPE html>
<html>

<!-- Head -->
@include('inc.head')
<!-- End of Head -->

<body>
	<!-- nav -->
	@include('inc.nav')
	<!-- End of nav -->

	<!-- Sidebar -->
	@include('inc.sidebar')
	<!-- End of Sidebar -->

	<!-- Content -->
@yield('content')
	<!-- End of content -->
	@include('inc.footer')
	<!-- Scripts -->
	@include('inc.scripts')
	<!-- End of dcripts -->

</body>
</html>