<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Session;
use DB;
use App\sanphammodel;
class admincontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('admin')){
        return view('admin/admin');
        }
        else{
            $data = "Mời bạn đăng nhập";
           return view('index', compact('data'));
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("loginadmin");
    }
    public function idinsertlsp(Request $request)
    {
        if($request->session()->has('admin')){
        return view('admin.insertlsp');
        }else{
            $data = "Mời bạn đăng nhập";
           return view('index', compact('data'));
        }
    }
    // public function idinsertsp(Request $request)
    // {
    //     if($request->session()->has('admin')){
    //         $datal=DB::table('loai')->get();
    //     return view('admin.insertsp',compact('datal'));
    //     }else{
    //         $data = "Mời bạn đăng nhập";
    //        return view('index', compact('data'));
    //     }
    // }
    public function listnhacc(Request $request)
    {
       if($request->session()->has('admin')){
            $data = DB::table('nhacc')->get();
            return view('admin.lisnhacc',compact('data'));
       }else{
           $data = "Mời bạn đăng nhập";
          return view('index', compact('data'));
       }
    }

    public function viewedit(Request $request){
        if($request->session()->has('admin')){
        $idnhacc = $request->id;
        $data = DB::table("nhacc")->where("idncc",$idnhacc)->first();
        $diachi = DB::table("dia")->get();
        return view("admin/viewedit",compact('data','diachi'));}
        else{
            $data = "Mời bạn đăng nhập";
            return view('index', compact('data'));
        }
    }

    public function editncc(Request $request){
        if($request->session()->has('admin')){
        if($request->hasFile('img')){
            $img = $request->img;
            $data=DB::table("nhacc")->where('idncc',$request->idncc)->first();
            $link1 = './image/'.$data->img;
           // echo $img->getClientOriginalName()." ".$request->idncc;
           $img->move("image",$img->getClientOriginalName());
           DB::table("nhacc")->where("idncc",$request->idncc)->update(["name"=>$request->name,"sdt"=>$request->sdt,"madc"=>$request->dc,"img"=>$img->getClientOriginalName(),"sosan"=>$request->sosan,"address"=>$request->address,"giatien"=>$request->giatien]);
            File::delete($link1); 
           return redirect("lisnhacc");
             }else{
           DB::table("nhacc")->where("idncc",$request->idncc)->update(["name"=>$request->name,"sdt"=>$request->sdt,"madc"=>$request->dc,"sosan"=>$request->sosan,"address"=>$request->address,"giatien"=>$request->giatien]);
           return redirect("lisnhacc");
        }}else{
            $data = "Mời bạn đăng nhập";
            return view('index', compact('data'));
        }
    }

    public function viewinsertnhacc(Request $request){
        if($request->session()->has('admin')){
        $diachi = DB::table("dia")->get();
        return view("admin/viewinsertnhacc",compact('diachi'));}
        else{
            $data = "Mời bạn đăng nhập";
            return view('index', compact('data'));
        }
    }

    public function insertncc(Request $request){
        if($request->session()->has('admin')){
        if($request->hasFile('img')){
            $datacheck = DB::table('useradmin')->where('username',$request->username)->get();
            if(count($datacheck) > 0){
                echo "tài khoản trùng";
            }else{
            $img = $request->img;
           // echo $img->getClientOriginalName()." ".$request->idncc;
           $img->move("image",$img->getClientOriginalName());
           DB::table("nhacc")->insert(["name"=>$request->name,"sdt"=>$request->sdt,"madc"=>$request->dc,"img"=>$img->getClientOriginalName(),"sosan"=>$request->sosan,"address"=>$request->address,"giatien"=>$request->giatien]); 
           $maxncc = DB::table("nhacc")->max("idncc");
            for($ngay = 1 ; $ngay < 4 ; $ngay++){
            for($i = 1 ; $i <= $request->sosan ; $i++){
                DB::table('tinhtrangsan')->insert(['idncc'=>$maxncc,'ngay'=>$ngay,'sosan'=>$i,'17h'=>0,'18h'=>0,'19h'=>0,'20h'=>0,'21h'=>0,'22h'=>0]);
            }
           }
           $maxidncc = DB::table('nhacc')->max('idncc');
          
           DB::table('useradmin')->insert(['username'=>$request->username,'password'=>$request->password,'quyen'=>$maxncc]);
           return redirect("lisnhacc");}
             }
        }else{
            $data = "Mời bạn đăng nhập";
            return view('index', compact('data'));
        }
    }

    // public function insertsp(Request $request)
    // {
    //     $dt = $request->all();
    //     if ($request->hasFile('anh')) {
    //     // $d=$request->anh;
    //     // print_r($d->getClientOriginalName());
    //     // $dt['anh'][0]->move(public_path("image"), $dt['anh'][0]);
    //     // $a = $request->anh;
           
    //     // echo $a[0]->getClientOriginalName();
    //     // $a[0]->move(public_path("image"), $a[0]->getClientOriginalName());
            
    //     // print_r($a->getClientOriginalName());}
    //     for($i = 0; $i < count($dt['ten']); $i++){
    //         $dt['anh'][$i]->move("image", $dt['anh'][$i]->getClientOriginalName());
    //         DB::table('sanpham')->insert(['tensp'=> $dt['ten'][$i] ,'maloai'=> $dt['loai'][$i],'img'=>$dt['anh'][$i]->getClientOriginalName()]);
    //     }
    //     return redirect('insertsanpham');
    // }
    // }
    public function deleterncc($id)
    {
        $data=DB::table("nhacc")->where('idncc',$id)->first();
        $link1 = $data->img;
        File::delete('./image/'.$link1);
        DB::table("nhacc")->where('idncc',$id)->delete();
        return redirect('lisnhacc');
    }
    // public function deletemenu($id)
    // {
    //     $data=DB::table('loai')->where('maloai',$id)->delete();
    //     return redirect('dsmenu');
    // }
    // function timmax(){
    //     $data = DB::table("nhacc")->max("idncc");
    //     echo "$data";
    // }
    public function successlogin(Request $request){
        $da = Session::get("admin");
        $lisuser = DB::table('chitietdatsan')
                ->join('usermenber', 'usermenber.id', '=', 'chitietdatsan.id')
                ->where('idncc',$da['quyen'])
                ->get();

                $datancc = DB::table("nhacc")->where("idncc",$da['quyen'])->first();

                $ngay1 = DB::table("tinhtrangsan")->where('idncc',$da['quyen'])->where('ngay',1)->get();
                
                $ngay2 = DB::table("tinhtrangsan")->where('idncc',$da['quyen'])->where('ngay',2)->get();
                
                $ngay3 = DB::table("tinhtrangsan")->where('idncc',$da['quyen'])->where('ngay',3)->get();

                return view('adminnhacc/quanlysan',["user"=>$da,"lisuser"=>$lisuser,'nhaccc'=>$datancc,'ngay1'=>$ngay1,'ngay2'=>$ngay2,'ngay3'=>$ngay3]);  
    }
    public function adminhuydat(Request $request)
    {
        $stt = $request->stt;
        // echo $stt;
        $data = DB::table("chitietdatsan")->where("stt",$stt)->first();
        $gio = substr($data->datetime,strlen($data->datetime)-3,3);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date=date_create(date('Y-m-d'));
        $date1=date_create(substr($data->datetime,0,10));
        $diff=date_diff($date,$date1);
        $ngay = $diff->format("%a")+1;
        DB::table("chitietdatsan")->where('stt',$stt)->delete();
        DB::table("tinhtrangsan")->where("idncc",$data->idncc)->where("ngay",$ngay)->where("sosan",$data->sanso)->update([$gio=>0]);
        return redirect('successlogin');
    }

    public function admidoitrangthai(Request $request){
        $ngay=$request->ngay;
        $san=$request->san;
        $gio = $request->gio;
        $nhacc = Session::get("admin");
        $idncc = $nhacc->quyen;
        // echo $idncc;
        $datatam =  DB::table("tinhtrangsan")->where("idncc",$idncc)->where("ngay",$ngay)->where("sosan",$san)->first();
        $tt = abs($datatam->$gio - 1);
        DB::table("tinhtrangsan")->where("idncc",$idncc)->where("ngay",$ngay)->where("sosan",$san)->update([$gio=>$tt]);
        // echo $da;
    }
}
