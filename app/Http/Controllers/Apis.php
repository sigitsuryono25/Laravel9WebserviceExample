<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Users;
use Illuminate\Http\Request;

class Apis extends Controller
{
    function receivedInput(Request $request){
        /*
        contoh json nya
        (kalo mau coba, copy dari kurawal buka sampe tutup)
        {
            "userid" : "sigitsuryono25",
            "password" : "12345"
        }
        */
        //get incoming raw (json) data
        //bentuknya array asosiatif (yang pake kurung kotak) kalo setelah getcontent itu ada true
        //print_r(untuk lihat datanya)
        $input = json_decode($request->getContent());
        $userid = $input->userid;
        $paswrd = $input->password;

        $user = Users::where(['userid' => $userid, 'passwd' => md5($paswrd)])->first();
        //check data kalo ada
        if(!empty($user)){
            return response(['message' => "User ditemukan", 'user' => $user], 200);
        }else{
            return response(['message'=> "data tidak ada"], 404);
        }
    }

    public function getListBarang()
    {
        $barang = Barang::all();
        if(!empty($barang)){
            return response(['message' => 'data ditemukan', 'barang' => $barang], 200);
        }else{
            return response(['message' => 'data tidak ada'], 404);
        }
    }

    public function insertBarang()
    {
        //do something here
    }

}
