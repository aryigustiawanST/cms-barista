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
use App\Models\Pushcontent;

class ServiceController extends Controller
{

    public function new_request(Request $request)
    {        
        $data = $request->all();
        $vendor_number = $data['my_number'];
        $no_client = $data['contact_name'];
        $client_number = str_replace("+", "", $no_client);

        // search
        $content = DB::table('tb_content')
            ->where('vendor_id', $vendor_number)
            ->first();

        $vendor = DB::table('tb_vendor')->where('vendor_id', $vendor_number)->first();
        $client = DB::table('tb_costumer')->where('costumer_phone', $client_number)->first();

        // echo $vendor_number;
        // print_r($content);die;

        $expired = date('Y-m-d', strtotime('+30 days'));   
        
        file_put_contents("new_request.txt", print_r($data,1));

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $pushid = '';
        for ($i = 0; $i < 6; $i++) {
            $pushid .= $characters[rand(0, $charactersLength - 1)]; 
        }

        $pageid = '';
        for ($i = 0; $i < 12; $i++) {
            $pageid .= $characters[rand(0, $charactersLength - 1)]; 
        }

        $send_url = "https://i.moom.icu/".$pageid;

        // IF PHONE CLIENT FOUND
        if($client) {

            $create = DB::table('tb_push_content')->insert([
                'push_id' => $pushid,
                'content_id' => $content->content_id,
                'expired_date' => $expired,
                'content_type' => $content->content_type,
                'content_url' => $content->publish_url,
                'phone_number' => $client_number,
                'page_id' => $pageid,
                'created_at' => date('Y-m-d')
            ]);
            
            // SEND WHATSAPP
                $key='023ba32338fafd774c965efb3befcdc708b55dd11b9b3b66'; 
                $url='http://116.203.92.59/api/send_message'; // for message

                $data = array(
                "phone_no"=> $client_number,
                "key"   =>$key,
                "message" =>'Hi '.$client->costumer_name.', Terima Kasih telah bergabung dengan kami, klik link disamping ini '.$send_url.' untuk melihat video dari Artis '.$vendor->vendor_name.'.'
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
            
            if ($create) {
                $result = array(
                    "code" => 200,
                    "status" => "berhasil",
                    "alldata" => array(
                        "url" => $send_url
                    )
                );
            } else {
                $result = array(
                    "code" => 400,
                    "status" => "gagal"
                );
            }
        
        } else { // ELSE NOT FOUND CLIENT NUMBER
            
            $result = array(
                "code" => 400,
                "status" => "gagal",
                "alldata" => array(
                    "message" => "Maaf nomor Anda tidak terdaftar"
                )
            );

        } // END IF
            
       return response()->json($result);
        
    }

    public function request_pin(Request $request)
    {
        $this->validate($request,[
            "page_id" => 'required',
        ]);

        $expired = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $push_content = DB::table('tb_push_content')->where('page_id', $request->page_id)->first();
        $pin = mt_rand(1000,9999);

        // print_r();die;
        
        DB::delete('delete from tb_otp where phone = ?', [$push_content->phone_number]);

        // SEND WHATSAPP
            $key='023ba32338fafd774c965efb3befcdc708b55dd11b9b3b66'; 
            $url='http://116.203.92.59/api/send_message'; // for message

            $data = array(
                "phone_no"=> $push_content->phone_number,
                "key"   =>$key,
                "message" =>'PIN anda adalah '.$pin
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

        $create = DB::table('tb_otp')->insert([
            'phone' => $push_content->phone_number,
            'pin' => $pin,
            'expired_date' => $expired,
            'content_url' => $push_content->content_url,
            'created_at' => date('Y-m-d')
        ]);
        
        if ($create) {
            $result = array(
                "code" => 200,
                "status" => "berhasil",
                "alldata" => array(
                    "client_number" => $push_content->phone_number
                )
            );
        } else {
            $result = array(
                "code" => 400,
                "status" => "gagal"
            );
        }

        return response()->json($result);
    }

    public function verify_pin(Request $request)
    {
        $this->validate($request,[
            "client_number" => 'required',
            "pin" => 'required',
        ]);

        $search = DB::table('tb_otp')
            ->where('phone', $request->client_number)
            ->where('pin', $request->pin)
            ->first();
    
        if ($search) {
        
            $today = strtotime(date('Y-m-d H:i:s'));
            $expired = strtotime($search->expired_date);

            // if($expired > $today) {
                $result = array(
                    "code" => 200,
                    "status" => "berhasil",
                    "alldata" => array(
                        "content_url" => $search->content_url
                    )
                );                            
            // } else {
            //     $result = array(
            //         "code" => 400,
            //         "status" => "gagal",
            //         "alldata" => array(
            //             "message" => 'Maaf, PIN anda sudah kadaluarsa'
            //         )
            //     );
            // }
        
        } else {        
            $result = array(
                "code" => 400,
                "status" => "gagal"
            );        
        }

        return response()->json($result);
    }

}