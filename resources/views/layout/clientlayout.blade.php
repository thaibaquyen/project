<!DOCTYPE html>
<html lang="en">
<head>
	<title>La Casa - Real Estate HTML5 Home Page Template</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="./css/reset.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">

	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="./css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

	<section class="hero">
		<header>
			<div class="wrapper">
				<a href="home"><img src="image/bong.jpg" style="width:80px; height:80px;" class="logo" alt="" titl=""/></a>
				<a href="#" class="hamburger"></a>
				<nav>
					<ul>
						<li><a href="{{ URL::to('/datsan') }}">Đặt Sân Nhanh</a></li>
						<li><a href="#">Tìm Đối Thủ</a></li>
						<li><a href="#">Lịch Bóng Đá</a></li>
						<li><a href="#">Spost Store</a></li>
					</ul>
					<a href="#" class="login_btn"><img src="image/{{ $kq->img }}" style="width:40px; height:40px;"/></a>
				</nav>
			</div>
		</header><!--  end header section  -->
		<div id="body">
        @yield('noidung');
		</div>
	</section><!--  end hero section  -->
</body>
</html>