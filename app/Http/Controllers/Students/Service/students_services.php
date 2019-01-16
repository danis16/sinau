<?php

namespace App\Http\Controllers\Students\Service;
use App\Http\Controllers\Controller;

class students_services extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function sendSms(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://rest.nexmo.com/sms/json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "from=Nexmo&text=Hello from Nexmo&to=6285211505159&api_key=bf64b79b%20&api_secret=4doV3dlkQsV5GKRi&undefined=",
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 7eaee0aa-1439-492a-8cc5-222b4be7a261",
        "cache-control: no-cache"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

}



