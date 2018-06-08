
<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<!-- <li><a href="#home" class="smoothScroll">Home</a></li>
				<li><a href="#about" class="smoothScroll">About</a></li>
				<li><a href="#screenshot" class="smoothScroll">Screenshots</a></li>
                <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
                <li><a href="#newsletter" class="smoothScroll">Newsletter</a></li>
				<li><a href="#" data-toggle="modal" data-target="#modal1">Contact</a></li>
			 -->
				<li><a href="gioithieu"class="smoothScroll">Giới thiệu </a></li>
			<li><a onclick="window.location= '/upload/filedowload/vHoadon4.5.5.376.zip'; return false;">Tải phần mềm</a></li>
			@foreach ($categories as $cate)
				<li>
					<a class="smoothScroll" href="category/{{ $cate->slug }}">{{ $cate->name }}</a>
	    		</li>
			@endforeach
			<li><a class="smoothScroll" href="huongdan">Hướng dẫn</a></li>
			<li><a class="smoothScroll" href="http://118.69.187.103:8090">Tra cứu</a></li>
    		<li><a class="smoothScroll" href="contact.html">Liên Hệ</a></li>
			</ul>
</div>