@extends('admin.master')
@section('style')
  <link rel="stylesheet" href="{{asset('')}}admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Hàng
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Nhập Hàng</a></li>
        <li class="active">Thêm Hàng</li>
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
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('postThemHang')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" >
              <div class="box-body">
                @if (count($errors) > 0 )
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                <select class="form-control" name="san_pham">
                	@foreach($san_pham as $row)
                    	<option value="{{$row->ma_sp}}">{{$row->ten_sp}}</option>
                    @endforeach
                  </select>
                <div class="form-group">
                  <label for="">Giá Nhập</label>
                  <input type="text" class="form-control" id="" name="gia_nhap" placeholder="Nhập Giá" required="">
                </div>
                <div class="form-group">
                  <label for="">Số Lượng</label>
                  <input type="text" class="form-control" id="" name="so_luong" placeholder="Nhập Số Lượng" required="">
                </div>
                <div class="form-group">
                  <label for="">Ngày sản xuất</label>
                  <input type="date" class="form-control" id="" name="ngay_sx" required="">
                </div>
                <div class="form-group">
                  <label for="">Thanh lý</label>
                  <input type="checkbox" value="1" name="thanh_ly" >
                </div>
              </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
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

@endsection