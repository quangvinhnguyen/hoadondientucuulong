@extends('admin.layout.layout')
@section('content')     
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 50px;">
                <h1 class="page-header">Khách hàng
                    <small>Danh Sách</small>
                </h1>
                @if(session('flash_success'))
                <div class="alert alert-success">
                    <strong>Thành Công! </strong>{{ session('flash_success') }}
                </div>
                @endif
                 @if(session('flash_err'))
                <div class="alert alert-danger">
                    <strong>Cảnh Báo! </strong>{{ session('flash_err') }}
                </div>
                @endif
                <table class="table table-striped table-bordered table-hover " id="example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Đại lý</th>
                            <th>Mã số thuế</th>
                            <th>Tên đơn vị </th>
                            <th>Địa chỉ đăng ký kinh doánh</th>
                            <th>Người liên hệ</th>
                            <th>Trạng thái</th>
                            <th>Mẫu</th>
                            <th> Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                   
                        @foreach($khachhangs as $khachhang)
                        <tr class="odd gradeX">
                            <td>{{ $khachhang->id }}</td>
                            <td>
                            <select class="form-control input-sm" id="dealerships" name="dealerships">
                            <option value="">----Chọn Đại lý tiếp quản----</option>
                            @foreach($dealerships as $dea)
                                <option value="{{ $dea->id }}">{{ $dea->name }}</option>
                            @endforeach
                             </select>
                                    </td>
                            <td>
                                {{ $khachhang->mast }}
                            </td>
                            <td>{{ $khachhang->tendv }}</td>
                            <td class="text-center">{{ $khachhang->dcdkkd }}</td>
                            <td>{{ $khachhang->nguoilienhe }}</td>
                            <td>
                            <select class="form-control input-sm" id="trangthai" name="trangthai">
                                <option value="0">New</option>
                                <option value="1">Đang tạo mẫu hóa đơn.</option>
                                <option value="2">chốt mẫu tạo source.</option>
                                <option value="3">cài đặt - đăng ký phát hành.</option>
                                <option value="4">Đang sử dụng.</option>
                             </select>
                                    </td>
                            <td><a onclick="window.location= '/{{ $khachhang->tailieu }}'; return false;" class="attach-file doc" href="/{{ $khachhang->tailieu }}"> xem </a>
                            </td>
                            <td>    
                            <a href="admin/khachhang/update/{{$khachhang->id}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa 
                                </a>
                                <button data-id="{{$khachhang->id}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Xoá
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Modal Delete-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Xóa Bài Viết</h4>
        </div>
        <div class="modal-body">
            <form id="form-delete">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="del-id">
                <p>Bạn có chắc muốn xóa bài viết với id <strong id="del-id"></strong> này?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger" id="delete">Xóa</a>
            </div>
            </form> 
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({'iDisplayLength': '50',"order": [[ 0, "desc" ]]});
        @if(Auth::user()->role=='admin')
        $('.status').css('cursor', 'pointer');
       $('#trangthai').val("{{$khachhang->trangthai}}");
        /*Changer Status */
        $('#trangthai').change(function(event) {
            id = "{{$khachhang->id}}";
            var status = $(this).val();
            var div = $(this);
            $.ajax({
                url: 'admin/khachhang/updatetrangthai',
                type: 'Put',
                data: {"id": id,"status":status,"_token": "{{ csrf_token() }}"},
            })
            .done(function(data) {
                if(data=='ok'){
                    $.alert("Thay đổi thành công.",{
                        autoClose: true,  closeTime: 3000, type: 'success',
                        position: ['top-right', [45, 30]],
                        withTime: 200,
                        title: 'Thành Công',
                        icon: 'glyphicon glyphicon-ok',
                        animation: true,
                        animShow: 'fadeIn',
                        animHide: 'fadeOut',
                    });
                } else {
                    $.alert(data,{
                        autoClose: true,  closeTime: 3000, type: 'danger',
                        position: ['top-right', [45, 30]],
                        withTime: 200,
                        title: 'Lỗi',
                        icon: 'glyphicon glyphicon-ok',
                        animation: true,
                        animShow: 'fadeIn',
                        animHide: 'fadeOut',
                    });
                }
            })
            .fail(function() {
                console.log("error");
            })
        });

    
        @endif

        //delete action
        $('#modal-delete').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var iddel = button.data('id')
          var modal = $(this)
          modal.find('.modal-body #del-id').html(iddel);
          modal.find('.modal-body #delete').attr('href', 'admin/khachhang/delete/'+iddel);
        })
    });   
 </script>
<script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap-flash-alert.js"></script>
@endsection
