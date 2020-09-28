@extends('layout.adminlayout')
@section('admin_content')
@if($user->quyen > 0)
<style>
    .dcjq-parent-li{
        display: none;
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
<div class="row" style="background: url(./image/back.jpg); height:500px;">
<div class="col-sm-2" style="background: #d6a8a8;">
    <div>Hệ thống có {{ $sochusan }} chử sân</div>
</div>
<div class="col-sm-2" style="background: #93bdc3;">
    <div>Đang có {{ $sosan }} Sân</div>
</div>
<div class="col-sm-2" style="background: #61a973;">
    <div>Số người dùng {{ $songuoi }} người</div>
</div>
<!-- <div class="col-sm-12">
    <img src="./image/back.jpg" style="height: 600px;">
</div> -->
</div>
@endsection