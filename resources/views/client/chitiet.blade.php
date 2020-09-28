<!DOCTYPE html>
<html lang="en">
<head>
	<title>La Casa - Real Estate HTML5 Home Page Template</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">
   <link href="./css/style.css" rel='stylesheet' type='text/css' />
   <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
    		$(".datsan").click(function(){
				var result = confirm("bạn có chắc đăng kí không");
				if(result){
				$.ajax({
      				url:"{{ URL::to('confimbook') }}",
					method:"GET",
      				data:{ ngay:$(this).attr("ngay"), san:$(this).attr("san"), gio:$(this).attr("gio") },
      				success:function(data){ 
						alert("bạn đã book thành công!")
						window.location.reload();
        			}
      			});}else{
					  alert("bạn đã hủy thao tác");
				  }
				//alert(" ngay "+$(this).attr("ngay") + " san " + $(this).attr("san") + " gio " + $(this).attr("gio"));
			});
		});
	</script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.hero{
    width: 100%;
    position: relative;
    background:url("../image/bg-home.jpg") top center no-repeat #000;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	}
	</style>
</head>
<body>

	<section class="hero" style="height:500px;">
        <div>
			<div style="margin:10px auto; text-align:center;">
				<div style="font-size: 24px;color: aliceblue; width:400px;margin:10px auto;">
						<p>Chủ Sân : {{ $nhaccc->name }}</p>
						<p>Địa Chỉ : {{ $nhaccc->address }} </p>
						<p>Giá Sân : {{ $nhaccc->giatien }}</p>
				</div>
					<style>
					h2 ,h4{
						color: #35b144;
						text-align: center;
					}
					</style>
			</div>
            <div class="row" style="margin-left:0px; width:95%; margin: 10px auto; background-color:rgba(192,192,192,0.4); padding:20px">		
						<div class="col-sm-4 col-12">
							<h2>Hôm Nay</h2>
							 <?php
							 $j = 1;
							 echo "<table>";
							 foreach($ngay1 as $value){
								 echo '<tr><td><h4>Sân '.$j.'</h4></td>';
								
								 $i=0;
								foreach($value as $k => $vl){
									if($i > 2){
										if($vl == 1){
											echo '<td><button type="button" class="btn btn-danger">'.$k.'</button></td>';
										}else{
											echo '<td><button type="button" class="datsan btn btn-primary" ngay="1" san='.$j.' gio='.$k.'>'.$k.'</button></td>';
										}
									}
									$i++;
								}
								echo "</tr>";
								$j++;
							}
							echo "</table>";
							?>
							
						</div>

						<div class="col-sm-4 col-12">
							<h2>Ngày Mai</h2>
							 <?php
							 $j = 1;
							 echo "<table>";
							 foreach($ngay2 as $value){
								 echo '<tr><td><h4>Sân '.$j.'</h4></td>';
		
								 $i=0;
								foreach($value as $k => $vl){
									if($i > 2){
										if($vl == 1){
											echo '<td><button type="button" class="btn btn-danger">'.$k.'</button></td>';
										}else{
											echo '<td><button type="button" class="datsan btn btn-primary" ngay="2" san='.$j.' gio='.$k.'>'.$k.'</button></td>';
										}
									}
									$i++;
								}
								echo "</tr>";
								$j++;
							}
							echo "</table>";
							?>
							
						</div>

						<div class="col-sm-4 col-12">
							<h2>Ngày Kia</h2>
							 <?php
							 $j = 1;
							 echo "<table>";
							 foreach($ngay3 as $value){
								 echo '<tr><td><h4>Sân '.$j.'</h4></td>';
								
								 $i=0;
								foreach($value as $k => $vl){
									if($i > 2){
										if($vl == 1){
											echo '<td><button type="button" class="btn btn-danger">'.$k.'</button></td>';
										}else{
											echo '<td><button type="button" class="btn btn-primary datsan" ngay="3" san='.$j.' gio='.$k.'>'.$k.'</button></td>';
										}
									}
									$i++;
								}
								echo "</tr>";
								$j++;
							}
							echo "</table>";
							?>
							
						</div>
            </div>
        </div>
    </section><!--  end hero section  -->
</body>
</html>