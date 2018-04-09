@extends('admin.master')
@section('style')
  <link rel="stylesheet" href="{{asset('')}}admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Người Dùng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Người Dùng</a></li>
        <li class="active">Người Dùng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Người Dùng</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('postThemNguoiDung')}}" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" >
              <div class="box-body">
                @if (count($errors) > 0 )
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
             	@endif
                <div class="form-group">
                  <label for="">Tên Người Dùng</label>
                  <input type="text" class="form-control" id="" name="ten_nguoi_dung" placeholder="Nhập Người Dùng" required="">
                </div>

                <div class="form-group">
                  <label for="">Số Điện Thoại</label>
                  <input type="text" class="form-control" name="sdt" placeholder="Nhập Số Điện Thoại" required="">
                </div>

                <div class="form-group">
                  <label for="">Địa Chỉ</label>
                  <input type="text" class="form-control" name="dia_chi" placeholder="Nhập Địa Chỉ" required="">
                </div>
                
                <div class="form-group">
                  <label for="">Tên Tài Khoản</label>
                  <input type="text" class="form-control" name="ten_tai_khoan" placeholder="Nhập Địa Chỉ" required="">
                </div>

                <div class="form-group">
                  <label for="">Mật Khẩu</label>
                  <input type="password" class="form-control" name="mat_khau" placeholder="Nhập Mật Khẩu" required="">
                </div>

                <div class="form-group">
                  <label for="">Nhập Lại Mật Khẩu</label>
                  <input type="password" class="form-control" name="nhac_mat_khau" placeholder="Nhập Lại Mật Khẩu" required="">
                </div>

                <div class="form-group">
                  <label>Quyền</label>
                  <select class="form-control" name="ma_quyen">
                  	@foreach($quyen as $row)
                    	<option value="{{$row->ma_quyen}}" >{{$row->ten_quyen}}</option>
                    @endforeach
                  </select>
                </div>

              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>

        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
	<script src="{{asset('')}}admins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('')}}admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{asset('')}}admins/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}admins/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{asset('')}}admins/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('')}}admins/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}admins/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('')}}admins/dist/js/demo.js"></script>
<!-- page script -->
<script src="{{asset('')}}admins/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('')}}admins/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@endsection