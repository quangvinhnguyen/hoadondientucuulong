
<div class="collapse navbar-collapse">
	<ul class="nav navbar-nav navbar-right">	
		<li><a href="gioithieu"class="smoothScroll">Giới thiệu </a></li>
	<li><a onclick="window.location= '/upload/filedowload/vHoadon4.5.5.376.zip'; return false;">Tải phần mềm</a></li>
	@foreach ($categories as $cate)
		<li>
			<a class="smoothScroll" href="category/{{ $cate->slug }}">{{ $cate->name }}</a>
		</li>
	@endforeach
	<li><a class="smoothScroll" href="huongdan">Hướng dẫn</a></li>
	<li><a class="smoothScroll" href="#">Tra cứu</a></li>
	<li><a class="smoothScroll" href="contact.html">Liên Hệ</a></li>
	</ul>
</div>