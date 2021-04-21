<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sentinel;
use DateTime;
use Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use File;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function client($vendorid)
    {
        return view('client');
    }

    public function p_client(Request $request)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $costumerid = '';
        
        for ($i = 0; $i < 6; $i++) {
            $costumerid .= $characters[rand(0, $charactersLength - 1)]; 
        }
        
        $expired = date('Y-m-d H:i:s', strtotime('+1 years'));
        $date = date('Y-m-d');

        $vendor = DB::table('tb_vendor')->where('vendor_id', $request->vendorid)->first();

        // SEND WHATSAPP
            $key='023ba32338fafd774c965efb3befcdc708b55dd11b9b3b66'; 
            $url='http://116.203.92.59/api/send_message'; // for message

            $data = array(
                "phone_no"=> $request->costumer_phone,
                "key"   =>$key,
                "message" =>'Terima kasih '.$request->costumer_name.' sudah bergabung dengan saya '.$vendor->vendor_name .'. Akun kamu memiliki masa tenggang sampai '.$expired.'.'
            );

            $data_string = json_encode($data);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 360);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
            );
            curl_exec($ch);
            curl_close($ch);
        // END WHATSWAPP

        DB::table('tb_costumer')->insert([
            'costumer_id' => $costumerid,
            'costumer_name' => $request->costumer_name,
            'costumer_phone' => $request->costumer_phone,
            'vendor_id' => $request->vendorid,
            'member_start' => $date,
            'member_expired' => $expired
        ]);

        return redirect('register/'.$request->vendorid.'/client')->with('message', 'Pendaftaran Berhasil');

        
    }
}