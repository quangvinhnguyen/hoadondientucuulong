@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">KHÁCH HÀNG 
                    <small>Thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:70px">
             @if(count($errors)>0)
             <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{ $err }}<br>
                @endforeach
            </div>
            @endif
            <form action="admin/khachhang/add" method="POST" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <div class="form-group">
                    <label><span>*</span>Mã số thuế</label>
                    <input type="text" name="mast" id="mast" class="form-control"  placeholder="Nhập mã số thuế ">
                </div>
                <div class="form-group">
                    <label><span>*</span>Tên đơn vị </label>
                    <input type="text" name="tendv" id="tendv" class="form-control" placeholder="Nhập tên đơn vị ">
                </div>
                <div class="form-group">
                    <label><span>*</span>Địa chỉ đăng ký kinh doanh </label>
                         <input type='text' class="form-control" name="dcdkkd" placeholder="Nhập địa chỉ đăng ký kinh doanh "/>
                </div>
                <div class="form-group">
                    <label><span>*</span>Người liên hệ</label>
                    <input type="text" name="nguoilienhe" id="nguoilienhe" class="form-control">
                </div>
                <div class="form-group">
                    <label><span>*</span>Email</label>
                    <input type="text" name="email" id="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label><span>*</span>Điện thoại di động</label>
                    <input type="text" name="dtdd" id="dtdd" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Điện thoại bàn</label>
                    <input type="text" name="dtb" id="dtb" class="form-control" >
                </div> 
                <div class="form-group">
                    <label> trạng thái  </label>
                    <select class="form-control" name="trangthai">
                            <option disabled="" selected="" value=""> -- trang thai -- </option>
                                                    <option value="0">New</option>
                                                    <option value="1">Đang tạo mẫu hóa đơn.</option>
                                                    <option value="2">chốt mẫu tạo source.</option>
                                                    <option value="3">cài đặt - đăng ký phát hành.</option>
                                                    <option value="4">Đang sử dụng.</option>
                                            </select>
                <div class="form-group">
                    <label>Tài liệu đính kèm (file logo hoặc file hóa đơn mẫu của đơn vị )</label>
                    <input type="file" name="tailieu" class="form-control" placeholder="">
                </div> 
                <button type="reset" class="btn btn-default">Làm Mới</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script src="js/slug.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
            $(document).ready(
                    function () {
                        $("#datepicker").datepicker({
                            dateFormat: 'dd-mm-yy',
                            changeMonth: true, //Tùy chọn này cho phép người dùng chọn tháng
                            changeYear: true //Tùy chọn này cho phép người dùng lựa chọn từ phạm vi năm
                        });
                    }
            );
        </script>
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection