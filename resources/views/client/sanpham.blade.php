<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
	<link rel="stylesheet" type="text/css" href="./css/responsive.css">
   <link href="./css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
    $(document).ready(function(){
    $("#btnseack").click(function(){
      $.ajax({
      url:"{{ URL::to('gettheodc') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{ id:$("#diachi").val() },
      success:function(data){ //dữ liệu nhận về
       $('#bodyy').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
        }
      });
    });

    $(".chitietsan").click(function(){
      $.ajax({
      url:"{{ URL::to('chitiet') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{ id:$(this).attr("idncc") },
      success:function(data){ //dữ liệu nhận về
       $('#chitietsan').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
        }
      });
    });
    });
    </script>
    <style>
	.hero{
    width: 100%;
    position: relative;
    background:url("./image/bg-home.jpg") top center #000;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
	}
	</style>
</head>
<body>
<div id="seach">
      <div style="width: 500px;
    box-shadow: 1px 2px red;
    text-align: center;
    margin: 30px auto;">
            <select id="diachi">
                <option value="ko" >---phường---</option>
                @foreach($diachi as $diachii)
                <option value="{{ $diachii->madc }}" >{{ $diachii->tendc }}</option>
                @endforeach
            </select>
            <button type="button" id="btnseack" class="btn btn-success">Tìm</button>
      </div>
</div>
<div id="bodyy">
<div class="features">
  <div class="features">
      <div class="container" style="background-color:rgba(192,192,192,0.4); padding:20px">
          <h3 class="m_3" id="len">Đặt Sân</h3>
            <div class="row">
            @foreach($datasp as $da)
            <div class="col-lg-3 col-sm-4 top_box" style="margin-top:30px;">
              <div class="view view-ninth" style="box-shadow: 4px 6px #888888;">
                        <img src="./image/{{ $da->img }}" style="width: 100%;height: 300px;" class="img-responsive" alt=""/>
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                          <div class="content">
                            <h2># {{$da->name }}</h2>
                            <p>{{ $da->address }}</p>
                            <p>{{ $da->giatien }}</p>
                            <p><button type="button" idncc="{{ $da->idncc }}" class="btn btn-danger chitietsan">Đặt Sân</button></p>
                          </div>
            </div> 
            </div>
            @endforeach
              </div>
        </div>
      </div>
</div>
</div>
<div style="background-color: #323757;"></div>
</body>
</html>