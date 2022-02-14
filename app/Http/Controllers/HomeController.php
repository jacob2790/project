<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function play_video()
    {
        // get vdocipher otp and playbackInfo
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev.vdocipher.com/api/videos/0f511fbeb2dcda596330028a00d519b2/otp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                "ttl" => 300,
            ]),
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Apisecret YXySlGNeWvpmGsxtRV14kmNz9K4ru788ec9hG4I3S9msKlV43MK7KQbcoLwykhO2",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $otp = $playback_info = '';
        $start_time = 11;
        if ($err) {
            dd("cURL Error #:" . $err);
        } else {
            $response = json_decode($response);
            $otp = $response->otp;
            $playback_info = $response->playbackInfo;
            //dd($response->otp);
        }

        return view('frontend.home.play_video', compact('otp', 'playback_info', 'start_time'));
        //return view('home');
    }
}
