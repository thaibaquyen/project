<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\userclient;
class homecontroller extends Controller
{
    public function login(Request $rq){
        $data = userclient::where('username',$rq->Username)->where('password',$rq->Password)->get();
        if(count($data) > 0 ){
            $da = $data[0];
           Session::put('client',$da);
           return view("welcome");  
        }else{
            $data = "Login false";
            return view('client/login', compact('data'));
        }
    }

    public function logout(Request $rq){
        $rq->session()->forget('client');
        return redirect("/");
    }

    public function singup(Request $rq){
        $data = $rq->all();
        Session::put('client',$data);
        DB::table('usermenber')->insert(['ten'=>$rq->ten,'email'=>$rq->email, 'username'=>$rq->username,'password'=>$rq->password]);
        return view("welcome"); 

    }
    public function getsp(Request $request)
    {
        // $kq = Session::get("admin");
        if($request->session()->has('client')){
            $datasp = DB::table("nhacc")->get();
            $diachi = DB::table("diachi")->get();
            // echo $datasp;
            return view('client/sanpham',['datasp'=>$datasp,'diachi'=>$diachi]);
        }else{
            $data = "Login false";
            return view('client/login', compact('data'));
        }
    }
    public function seach(Request $request){
        $id = $request->id;
        if($id == "ko"){
            $datasp = DB::table("nhacc")->get();
            return View('client/seach',compact('datasp'));
        }
        else{
        $datasp = DB::table("nhacc")->where("madc",$id)->get();
        return View('client/seach',compact('datasp'));}
    }

    public function xldatsan(Request $request){

        $id=$request->id;

        Session::put('idnhacc',$id);

        $datancc = DB::table("nhacc")->where("idncc",$id)->first();

        $ngay1 = DB::table("tinhtrangsan")->where('idncc',$id)->where('ngay',1)->get();
        
        $ngay2 = DB::table("tinhtrangsan")->where('idncc',$id)->where('ngay',2)->get();
        
        $ngay3 = DB::table("tinhtrangsan")->where('idncc',$id)->where('ngay',3)->get();

        // print_r($ngay1);
       return View('client/chitiet',['nhaccc'=>$datancc,'ngay1'=>$ngay1,'ngay2'=>$ngay2,'ngay3'=>$ngay3]);
    }
    public function confimdat(Request $request){
        $ngay=$request->ngay;
        $san=$request->san;
        $gio = $request->gio;
        $user = Session::get("client");
        $data = DB::table('usermenber')->where("username",$user["username"])->where("password",$user["password"])->get();
        $nhacc = Session::get("idnhacc");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date=date_create(date('Y-m-d'));
        date_modify($date, "+".($ngay-1)." days");
        $datetime = date_format($date, "Y-m-d")." giờ : ".$gio;
        // return $datetime;
        DB::table("chitietdatsan")->insert(['id'=>$data[0]->id,'sanso'=>$san,'idncc'=>$nhacc,'datetime'=>$datetime]);
        DB::table("tinhtrangsan")->where("idncc",$nhacc)->where("ngay",$ngay)->where("sosan",$san)->update([$gio=>1]);
    }

    public function showprifile(){
        $user = Session::get("client");
        // $data = DB::table("chitietdatsan")->where("id",$user['id'])->first();
        // $nhacc = DB::table("nhacc")->where("idncc",$data->idncc)->first();
        // return view("client/viewprofile",['user'=>$user,'data'=>$data,'nhacc'=>$nhacc]);
        $data = DB::table('chitietdatsan')
            ->join('nhacc', 'nhacc.idncc', '=', 'chitietdatsan.idncc')
            ->where('id',$user['id'])
            ->get();
        $tt = "";
        foreach($data as $vl){
            $tt .= "<div>";
            $tt .="<p>chủ sân $vl->name </p>";
            $tt .= "<p>$vl->address </p>";
            $tt .= "<p>giá : $vl->giatien sân số : $vl->sanso </p>";
            $tt .= "<p>thời gian : $vl->datetime </p>";
            $tt .= "<p><a href='deleteddatsan/$user->id/$vl->stt'><button type='button' class='btn btn-danger'>Hủy</button></a></p> ";
            $tt .= "</div>";
        }
        echo $tt;
        // return view("client/viewprofile",['data'=>"ddd"]);
        // date_default_timezone_set('Asia/Ho_Chi_Minh');
        // $date=date_create(date('Y-m-d'));
        // $date1=date_create(substr($data->datetime,0,10));
        // $diff=date_diff($date,$date1);
        // echo $diff->format("%a");
        // echo substr($data["datetime"],0,10);
        //echo $data->datetime;
    }

    public function deleteddatsan($id, $stt){
        $data = DB::table("chitietdatsan")->where("stt",$stt)->first();
        $gio = substr($data->datetime,strlen($data->datetime)-3,3);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date=date_create(date('Y-m-d'));
        $date1=date_create(substr($data->datetime,0,10));
        $diff=date_diff($date,$date1);
        $ngay = $diff->format("%a")+1;
        DB::table("chitietdatsan")->where('id',$id)->where('idncc',$data->idncc)->where('datetime',$data->datetime)->delete();
        DB::table("tinhtrangsan")->where("idncc",$data->idncc)->where("ngay",$ngay)->where("sosan",$data->sanso)->update([$gio=>0]);
        return redirect('index');
        
        // print_r($data);
    }
    //--------------------

    public function themtinhtrang(){
        $nhacc = DB::table("nhacc")->get();
        foreach($nhacc as $nha)
            for($ngay = 1 ; $ngay < 4 ; $ngay++){
                for($i = 1 ; $i <= $nha->sosan ; $i++){
                    DB::table('tinhtrangsan')->insert(['idncc'=>$nha->idncc,'ngay'=>$ngay,'sosan'=>$i,'17h'=>0,'18h'=>0,'19h'=>0,'20h'=>0,'21h'=>0,'22h'=>0]);
                }
            }
    }

    // public function tett(){
    //     return redirect('tettt/2');
    // }

    // public function tettt($id){
    //     echo $id;
    // }
}
