<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mỹ Phẩm | E-Shopper</title>
    @include('user.css')
</head><!--/head-->

<body>
	@include('user.header')
	
	@yield('content')
	
	@include('user.footer')
  
	@include('user.js')
</body>
</html>





