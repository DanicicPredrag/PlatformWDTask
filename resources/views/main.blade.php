<!doctype html>
<html>
<head>
	@include('includes.head')
</head>
<body>

@include('includes.navbar')
<div class="container-fluid">
	@yield('content')
	<footer class="row">
		@include('includes.footer')
	</footer>
</div>
@include('includes.footer-scripts')
</body>
</html>