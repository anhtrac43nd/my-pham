@extends('admin.master')
@section('style')
  <link rel="stylesheet" href="{{asset('')}}admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Danh Sách Hóa Đơn

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Danh Sách Hóa Đơn</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh Sách Hóa Đơn</h3>
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
                  <th>Mã Hóa Đơn</th>
                  <th>Tên Khách Hàng</th>
                  <th>Ngày Đặt Hàng</th>
                  <th>Tổng Tiền</th>
                  <th>Trạng Thái Chuyển Tiền</th>
                  <th>Trạng Thái Nhận</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($hoa_don as $row)
                <tr>
                  <td>{{$row->ma_hd}}</td>
                  <td>{{@$row->nguoiDung->ten_nd}}</td>
                  <td>{{$row->ngay_dat_hang}}</td>
                  <td>{{$row->tong_tien}}</td>
                  <td>@if($row->trang_thai_chuyen_tien == 1)
                        Đã Nhận
                      @else
                        Chưa Nhận
                      @endif
                  </td>
                  <td>@if($row->trang_thai_nhan == 2)
                        Đã Nhận
                      @elseif($row->trang_thai_nhan == 1)
                        Đang vận chuyển
                      @else
                        Chưa vận chuyển
                      @endif
                  </td>
                  <td><a href="{{route('ctHoaDonBan', $row->ma_hd)}}">Chi Tiết Hóa Đơn</a>
                  </td>
                  <td><a href="{{route('inHDB', $row->ma_hd)}}" data-id="{{$row->ma_hd}}" class="print_hd" >In Hóa đơn</a></td>
                  <td><a href="{{route('suaHoaDon', $row->ma_hd)}}">Cập nhật</a></td>
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

<script src="{{asset('')}}admins/js/jquery.printPage.js"></script>

    <!-- page script -->
<script>
    // $(document).on('click', '.print_hd', function(){
    //     var id = $(this).attr('data-id');
    //     var url = window.location.origin + '/admin/hoa-don-ban/id/' + id;
    //
    //     $("<iframe>")                             // create a new iframe element
    //         .hide()                               // make it invisible
    //         .attr("src", url) // point the iframe to the page you want to print
    //         .appendTo("body");
    //     window.print();
    //     // alert(url);
    //
    //     (console.log(window.print()));
    // });
    // $(".print_hd").printPage();
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