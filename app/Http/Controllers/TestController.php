<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function dataStructure()
    {
        $s = [2, 1, 6, 9, 9, 4, 3];
        $x = array_unique($s);
        rsort($x);
        echo "Nilai terbesar kedua : " . $x[1];
    }

    public function searchProvince(Request $request)
    {
        $url = 'https://api.rajaongkir.com/starter/province?id=' . $request->id;

        $client = new Client();
        $res = $client->request('GET', $url , [
            'headers' => [
                'key'   => '0df6d5bf733214af6c6644eb8717c92c'
            ]
        ]);

        $response = json_decode($res->getBody()->getContents())->rajaongkir;
        $status = $response->status;
        $data = $response->results->province;
        
        return response()->json([
            'code'      => $status->code,
            'message'   => $status->description,
            'data'      => $data
        ]);
    }

    public function searchCity(Request $request)
    {
        $url = 'https://api.rajaongkir.com/starter/city?id=' . $request->id;

        $client = new Client();
        $res = $client->request('GET', $url , [
            'headers' => [
                'key'   => '0df6d5bf733214af6c6644eb8717c92c'
            ]
        ]);

        $response = json_decode($res->getBody()->getContents())->rajaongkir;
        $status = $response->status;
        $data = $response->results;
        
        return response()->json([
            'code'      => $status->code,
            'message'   => $status->description,
            'data'      => [
                'provinsi'  => $data->province,
                'tipe'      => $data->type,
                'kota'      => $data->city_name,
                'kodepos'   => $data->postal_code
            ]
        ]);
    }

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
