<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\useradmin;
use Session;
use DB;
class logincontroler extends Controller
{
    public function checklogin(Request $rq) {
        $data = useradmin::where('username',$rq->user)->where('password',$rq->pass)->get();
        if(count($data) > 0 ){
            $da = $data[0];
            $sochusan = DB::table('nhacc')->count();
            $songuoidung = DB::table('usermenber')->count();
            $sosan = DB::table('nhacc')->sum('sosan');
            Session::put('admin',$da);
            if($da['quyen'] == 0){
                return view('admin/admin',["user"=>$da, "sochusan"=>$sochusan, "songuoi"=>$songuoidung, "sosan"=>$sosan]);  
            }else{
                return redirect('successlogin');
            }
        }else{
            $data = "Login false";
            return view('index', compact('data'));
        }
    }
    public function xlfile(Request $request){
        echo "ok";
        if ($request->hasFile('filesTest')) {
            $file = $request->filesTest;

            //Lấy Tên files
            echo 'Tên Files: ' . $file->getClientOriginalName();
            echo '<br/>';

            //Lấy Đuôi File
            echo 'Đuôi file: ' . $file->getClientOriginalExtension();
            echo '<br/>';

            //Lấy đường dẫn tạm thời của file
            echo 'Đường dẫn tạm: ' . $file->getRealPath();
            echo '<br/>';

            //Lấy kích cỡ của file đơn vị tính theo bytes
            echo 'Kích cỡ file: ' . $file->getSize();
            echo '<br/>';

            //Lấy kiểu file
            echo 'Kiểu files: ' . $file->getMimeType();
            $ten = $file->getClientOriginalName().".".$file->getClientOriginalExtension();
            $file->move(public_path("image"), $ten);
            echo "ok";
        }
    }
}
