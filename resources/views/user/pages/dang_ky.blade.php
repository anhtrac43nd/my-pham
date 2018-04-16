@extends('user.master')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Tạo tài khoản mới</h2>
                        <form action="{{route('postDangKy')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (count($errors) > 0 )
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <input type="text" name="ho_ten" placeholder="Họ và tên" required>
                            <input type="text" name="sdt" placeholder="SĐT" required>
                            <input type="text" name="ten_tk" placeholder="Tên tài khoản" required>
                            <input type="text" name="dia_chi" placeholder="Địa chỉ" required>
                            <input type="password" name="mat_khau" placeholder="Mật khẩu" required>
                            <input type="password" name="nhac_mat_khau" placeholder="Nhập lại mật khẩu" required>
                            <button type="submit" class="btn btn-default">Tạo tài khoản</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
@endsection