<!-- <!doctype html>
<html lang="en">
@include('news.partials.head')
<body>
	@include('news.partials.header')
	
	<section class="container row clearfix">
		@include('news.partials.menu')
		<section class="inner-container ">
			<section id="content" class="eight column row pull-left">
				@include('news.partials.slide')
				@yield('content')
				
			</section>
			@include('news.partials.sidebar')
		</section>
	</section>
	@include('news.partials.footer')
	@include('news.partials.importjs')
	@yield('js')
</body>
</html> -->


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
		<!-- Inner Container -->
		<section class="inner-container ">

			<!-- Content -->
			<section id="content" class="eight column row pull-left">
				<!-- Slider -->
				@include('news.partials.slide')
				<!-- End Slider -->

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