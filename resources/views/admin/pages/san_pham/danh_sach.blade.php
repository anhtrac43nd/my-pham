@extends('admin.master')
@section('style')
  <link rel="stylesheet" href="{{asset('')}}admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Danh Sách Sản Phẩm

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Danh Sách Sản Phẩm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          <a href="{{route('themSanPham')}}"><button type="button" class="btn btn-block btn-primary">Thêm Sản Phẩm</button></a>
        </div>
      </div>
      <div class="row">
        
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh Sách Sản Phẩm</h3>
            </div>
              @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
              @endif
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã Sản Phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Loại Sản Phẩm</th>
                  <th>Tên Thương Hiệu</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Ảnh</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($san_pham as $row)
                <tr>
                  <td>{{$row->ma_sp}}</td>
                  <td>{{$row->ten_sp}}</td>
                  <td>{{@$row->loaiSanPham->ten_loai}}</td>
                  <td>{{@$row->thuongHieu->ten_thuong_hieu}}</td>
                  <td>{{$row->don_gia}}</td>
                  <td>{{$row->so_luong}}</td>
                  <td><img height="100px;" src="{{asset('')}}upload/hinh_anh/{{$row->anh}}"></td>
                  <td><a href="{{route('suaSanPham', $row->ma_sp)}}">Sửa</a>|
                      <a href="{{route('xoaSanPham', $row->ma_sp)}}">Xóa</a></td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
	<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection