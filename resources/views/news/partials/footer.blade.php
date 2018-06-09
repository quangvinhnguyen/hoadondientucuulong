
<!-- Footer Section -->

<footer>
	<div class="container">
		<div class="row">

               <div class="col-md-8 col-sm-6">
                    <div class="wow fadeInUp footer-copyright" data-wow-delay="0.4s">
                         Design: <a href="#" title="free css templates" target="_blank">nqvinhmaster1995@gmail.com</a></p>
                    </div>
               </div>

			<div class="col-md-4 col-sm-6">
				<ul class="wow fadeInUp social-icon" data-wow-delay="0.8s">
                         <li><a href="#" class="fa fa-facebook"></a></li>
                         <li><a href="#" class="fa fa-twitter"></a></li>
                         <li><a href="#" class="fa fa-google-plus"></a></li>
                         <li><a href="#" class="fa fa-dribbble"></a></li>
                         <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
               </div>
			
		</div>
	</div>
</footer>


<!-- Modal Contact -->

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content modal-popup">
          <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <h2 class="modal-title">Đăng ký </h2>
          </div>
        <form action="/khachhang/register" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group">
                    <input type="text" name="mast" id="mast" class="form-control" value="{{ old('mast')}}" placeholder="Nhập mã số thuế "required>
                </div>
                <div class="form-group">
                    <input type="text" name="tendv" id="tendv" class="form-control" value="{{ old('tendv')}}" placeholder="Nhập tên đơn vị "required>
                </div>
                <div class="form-group">
                         <input type='text' class="form-control" id="datepicker" name="dcdkkd" value="{{ old('dcdkkd') }}"placeholder="Nhập địa chỉ đăng ký kinh doanh "required>
                </div>
                <div class="form-group">
                    <input type="text" name="nguoilienhe" id="nguoilienhe" class="form-control" value="{{ old('nguoilienhe')}}"placeholder="Người liên hệ"required>
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email')}}"placeholder="email"required>
                </div>
                <div class="form-group">
                    <input type="text" name="dtdd" id="dtdd" class="form-control" value="{{ old('dtdd')}}"placeholder="Điện thoại di động "required>
                </div>
                <div class="form-group">
                    <input type="text" name="dtb" id="dtb" class="form-control" value="{{ old('dtb')}}"placeholder="Điện thoại bàn">
                </div> 
                <div class="form-group">
                    <h4 class="modal-title">Tài liệu đính kèm (file logo hoặc file hóa đơn mẫu của đơn vị )</h4>
                    <input type="file" name="tailieu" class="form-control" placeholder="">
                </div>   
                <div class="text-center">
                    <button type="submit" class="btn">Đăng ký</button>
                </div>
        </form>
          </div>
     </div>
</div>

<!-- Back top -->

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

	<div class="copyright ">
	© Design by vinhnq@visnam.com
	</div>

	