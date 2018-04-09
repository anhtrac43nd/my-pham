@extends('admin.master')
@section('style')
  <link rel="stylesheet" href="{{asset('')}}admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Sản Phẩm
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sản Phẩm</a></li>
        <li class="active">Sản Phẩm</li>
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
              <h3 class="box-title">Sản Phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('postThemSanPham')}}" method="post" enctype="multipart/form-data">
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
                  <label for="">Tên Sản Phẩm</label>
                  <input type="text" class="form-control" id="" name="ten_san_pham" placeholder="Nhập Sản Phẩm" required="">
                </div>

                <div class="form-group">
                  <label>Loại Sản Phẩm</label>
                  <select class="form-control" name="loai_sp">
                  	@foreach($loai_san_pham as $row)
                    	<option value="{{$row->ma_loai}}">{{$row->ten_loai}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Thương Hiệu</label>
                  <select class="form-control" name="thuong_hieu">
                  	@foreach($thuong_hieu as $row)
                    	<option value="{{$row->ma_thuong_hieu}}">{{$row->ten_thuong_hieu}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Giá</label>
                  <input type="text" class="form-control" required="" name="gia" placeholder="Nhập giá của sản phẩm ...">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="hinh_anh" id="hinh_anh">
                  <p class="help-block">Vui lòng chọn file</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Mô tả</label>
                  <div class="box box-info">
		            <div class="box-header">
		              <h3 class="box-title">CK Editor
		              </h3>
		              
		              <div class="pull-right box-tools">
		                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
		                        title="Collapse">
		                  <i class="fa fa-minus"></i></button>
		                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
		                        title="Remove">
		                  <i class="fa fa-times"></i></button>
		              </div>
		             
		            </div>
		           
		            <div class="box-body pad">
	                    <textarea id="editor1" name="mo_ta" rows="20" cols="80">
	                        
	                    </textarea>
		            </div>
		          </div>
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