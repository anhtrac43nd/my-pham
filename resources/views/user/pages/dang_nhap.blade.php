@extends('user.master')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập</h2>
                        <form action="{{route('postDangNhap')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (count($errors) > 0 )
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-danger">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            <input type="text" name="ten_tk" placeholder="Tài khoản">
                            <input type="password" name="mat_khau" placeholder="Mật khẩu">
                            <span>
								<input type="checkbox" class="checkbox">
								Nhớ đăng nhập
							</span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-4"></div>

            </div>
        </div>
    </section>
@endsection