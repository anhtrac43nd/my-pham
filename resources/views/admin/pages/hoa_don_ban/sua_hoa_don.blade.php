@extends('admin.master')
@section('style')
    <link rel="stylesheet" href="{{asset('')}}admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa hóa đơn
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Sửa hóa đơn</a></li>
                <li class="active">Sửa hóa đơn</li>
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
                            <h3 class="box-title">Sửa hóa đơn</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('postSuaHoaDon', $hoa_don->ma_hd)}}" method="post" enctype="multipart/form-data">
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
                                    <label for="">Tên khách hàng</label>
                                    <input type="text" class="form-control" value="{{$hoa_don->nguoiDung->ten_nd}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Ngày đặt hàng</label>
                                    <input type="date" class="form-control" value="{{$hoa_don->ngay_dat_hang}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Tổng tiền</label>
                                    <input type="text" class="form-control" value="{{$hoa_don->tong_tien}}" disabled >
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái chuyển tiền</label>
                                    <input type="text" class="form-control" value="@if($hoa_don->trang_thai_chuyen_tien == 1) Đã nhận @else Chưa nhận @endif" disabled >
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái nhận</label>
                                    <select class="form-control" name="trang_thai_nhan">
                                        <option value="0" @if($hoa_don->trang_thai_nhận == 0) selected @endif>Chưa vận chuyển</option>
                                        <option value="1" @if($hoa_don->trang_thai_nhận == 1) selected @endif>Đang vận chuyển</option>
                                        <option value="2" @if($hoa_don->trang_thai_nhận == 2) selected @endif>Đã nhận</option>

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