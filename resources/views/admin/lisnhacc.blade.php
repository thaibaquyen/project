@extends('layout.adminlayout')
@section('admin_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
    <script>
    $(document).ready(function(){
    $(".edit").click(function(){
      $.ajax({
      url:"{{ URL::to('editnhacc') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{ id:$(this).attr("idnhacc") },
      success:function(data){ //dữ liệu nhận về
          $('#viewedit').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
        }
      });
    });

    $("#insertncc").click(function(){
      $.ajax({
      url:"{{ URL::to('insertnhacc') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{ },
      success:function(data){ //dữ liệu nhận về
          $('#viewedit').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
        }
      });
    });

  });
    </script>
<style>
    td img:hover{
        transform: scale(1.9);
    }
</style>
<div>
<h2>Bạn có thể xóa|sửa nhà cung cấp tại đây</h2>
<p style="float:right"><a href="#viewedit"><button type="button" id="insertncc" class="btn btn-success">Thêm nhà cung cấp</button></a></p>
</div>
<div class="container">  
  <table class="table table-striped">
    <thead>
      <tr>
        <th id="id" style="width:10%;">Tên</th>
        <th style="width:20%;">địa chỉ</th>
        <th style="width:10%;">Sdt</th>
        <th id="id" style="width:20%;">img</th>
        <th style="width:5%;">số sân</th>
        <th style="width:10%;">giá sân</th>
        <th id="id" style="width:10%;">sửa</th>
        <th style="width:10%;">xóa</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $da)
      <tr>
        <td id="id" style="width:10%;">{{ $da->name }}</td>
        <td id="id" style="width:20%;">{{ $da->address }}</td>
        <td id="id" style="width:10%;">{{ $da->sdt }}</td>
        <td style="width:20%;"> <img src="./image/{{ $da->img }}" style="width: 80px;height: 80px;" class="img-responsive" alt=""/></td>
        <td id="id" style="width:5%;">{{ $da->sosan }}</td>
        <td id="id" style="width:10%;">{{ $da->giatien }}</td>
        <td style="width:10%;"><button type="button" class="btn btn-danger edit" idnhacc="{{ $da->idncc }}">sửa</button></td>
        <td style="width:10%;"><a href="deleted/{{ $da->idncc }}"><button type="button" class="btn btn-danger">Xóa</button></a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div id="viewedit">
  </div>
</div>
@endsection