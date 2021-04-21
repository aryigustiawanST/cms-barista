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

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard($id)
    {
        return view('dashboard');
    }

    public function list($id)
    {
        $video = DB::table('tb_content')
                ->select(DB::raw('ref_content.content_type as type, tb_content.*'))
                ->join('ref_content', 'ref_content.id', '=', 'tb_content.content_type', 'left')
                ->where('tb_content.content_type', 2)
                ->where('tb_content.vendor_id', $id)
                ->orWhere('tb_content.content_type', 3)
                ->get();

        return view('list', ['video' => $video]);
    }

    public function images()
    {   
        return view('image');
    }

    public function private()
    {
        $private = DB::table('tb_content')
                    ->where('content_type', 2)
                    ->get();

        return view('private', ['private' => $private]);
    }

    public function p_video(Request $request)
    {   
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $contentid = '';
        
        for ($i = 0; $i < 6; $i++) {
            $contentid .= $characters[rand(0, $charactersLength - 1)]; 
        }

        $date = date('Y-m-d');

        DB::table('tb_content')->insert([
            'content_id' => $contentid,
            'vendor_id' => $request->vendor_number,
            'content_type' => $request->content_type,
            'upload_date' => $date,
            'publish_date' => $date,
            'publish_url' => $request->publish_url
        ]);
  
         return redirect('content/'.$request->vendor_number.'/list')->with('message', 'Successfully Add Video');
        
    }

    public function d_video($vendorid, $id, Request $request)
    {
        DB::table('tb_content')->where('content_id',$id)->delete();
        return redirect('content/'.$vendorid.'/list')->with('message', 'Successfully Delete Video');
    }
}
