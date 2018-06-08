
<!doctype html>
<html lang="en">
@include('news.partials.head')
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<!-- PRE LOADER -->
<!-- Navigation Section -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">	
		@include('news.partials.header')

		@include('news.partials.menu')
	</div>
</div>
		<!-- Home Section -->

		<section id="home" class="main">

	
				@yield('content')
				
			</section>
			<!-- End Content -->

			<!-- Sidebar -->
			@include('news.partials.sidebar')
			<!-- End Sidebar -->

			<!-- Footer -->
			

		</section>
		<!-- End Inner Container -->
	</section>
	<!-- End Container -->
	@include('news.partials.footer')
			<!-- End Footer -->
	<!-- Import js -->
	@include('news.partials.importjs')
	@yield('js')
</body>

</html>