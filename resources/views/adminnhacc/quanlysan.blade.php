@extends('layout.adminlayout')
@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
		$(document).ready(function(){
    		$(".xoadatsan").click(function(){
				var result = confirm("bạn có chắc muốn hủy không");
				if(result){
					var stt = $(this).val();
				$.ajax({
      				url:"{{ URL::to('adminhuydat') }}",
					method:"GET",
      				data:{ stt: stt },
      				success:function(data){ 
						window.location.reload();
        			}
      			});
				//   var stt = $(this).val();
				//   alert(stt);
				  }else{
					  alert("bạn đã hủy thao tác");
				  }
				//alert(" ngay "+$(this).attr("ngay") + " san " + $(this).attr("san") + " gio " + $(this).attr("gio"));
			});

			$(".datsan").click(function(){
				var result = confirm("bạn có chắc muốn đổi trạng thái không");
				if(result){
				$.ajax({
      				url:"{{ URL::to('admidoitrangthai') }}",
					method:"GET",
					data:{ ngay:$(this).attr("ngay"), san:$(this).attr("san"), gio:$(this).attr("gio") },
      				success:function(data){ 
						window.location.reload();
						// alert(data);
        			}
      			});
				//   var stt = $(this).val();
				//   alert(stt);
				  }else{
					  alert("bạn đã hủy thao tác");
				  }
			});
		});
</script>
@if($user->quyen > 0)
<style>
    .dcjq-parent-li{
        display: none;
    }
    #ctdat{
        text-align: center;
        width: 400px;
        margin: 10px auto;
    }
    #ctdat td{
        border: 1px #1a1fd4 solid;
    }
	table{
		text-align: center;
	}
</style>
@endif
<style>
    .row .col-sm-2{
        height: 70px;
        border-radius: 20px;
        text-align: center;
        padding: 10px;
    }
</style>
<div class="row">
<section class="hero" style="height:500px;">
        <div>
			<div style="margin:10px auto; text-align:center;">
				<div style="font-size: 24px;color: #2a17cc; width:400px;margin:10px auto;">
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
            <div id="ctdat">
            <table>
                    <tr>
                        <td>Name</td>
                        <td>phone</td>
                        <td>Sân Số</td>
                        <td>Time</td>
                        <td>Xóa</td>
                    </tr>
                    @foreach($lisuser as $data)
                    <tr>
                        <td>{{ $data->ten }}</td>
                        <td>{{ $data->sdt }}</td>
                        <td>{{ $data->sanso }}</td>
                        <td>{{ $data->datetime }}</td>
                        <td><button type="button" class="xoadatsan btn btn-danger" value = '{{ $data->stt }}'>Xóa</button></td>
                    </tr>
                    @endforeach
            </table>
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
											echo '<td><button type="button" class="datsan btn btn-danger" ngay="1" san='.$j.' gio='.$k.'>'.$k.'</button></td>';
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
											echo '<td><button type="button" class="datsan btn btn-danger" ngay="2" san='.$j.' gio='.$k.'>'.$k.'</button></td>';
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
											echo '<td><button type="button" class="btn btn-danger datsan" ngay="3" san='.$j.' gio='.$k.'>'.$k.'</button></td>';
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
</div>
@endsection