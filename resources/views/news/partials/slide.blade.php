<!-- <div class="flexslider mb25">
	<ul class="slides no-bullet inline-list m0">
        @foreach($posts as $post)
		<li>
     		<a href="post/{{ $post->slug }}.html">
                <img alt="{{ $post->feture }}" src="{{ $post->feture }}"> 
            </a>                    
     		<div class="flex-caption">
                <div class="desc">
                	<h1><a href="post/{{ $post->slug }}.html">{{ $post->title }}</a></h1>
                	<p>{{ $post->description }}</p>
                </div>
            </div>
		</li>
		@endforeach
	</ul>
</div> -->
<div class="overlay"></div>
	<div class="container">
		<div class="row">

               <div class="wow fadeInUp col-md-6 col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0" data-wow-delay="0.2s">
                    <img src="images/home-img.png" class="img-responsive" alt="Home">
               </div>

               <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="home-thumb">
                         <h1 class="wow fadeInUp" data-wow-delay="0.6s">App Starter Page</h1>
                         <p class="wow fadeInUp" data-wow-delay="0.8s">The optimal way to present your beautiful mobile app for your startup team. Let us create amazing things!</p>
                         <a href="#pricing" class="wow fadeInUp section-btn btn btn-success smoothScroll" data-wow-delay="1s">Download App</a>
                    </div>
               </div>

		</div>
	</div>
