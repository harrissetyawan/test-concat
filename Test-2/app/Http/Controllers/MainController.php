<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class MainController extends Controller
{

    public function index()
    {

        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'key' => env('API_KEY')
        ])->get('https://api.rajaongkir.com/starter/city');

        $results = $response->json();
        return View('index', ['results' => $results]);
    }


    public function CekOngkir(Request $request)
    {
        $origin = 39;
        $destination = $request->input('destination');
        $weight = $request->input('weight');
        $courier = $request->input('courier');

        $response = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'key' => env('API_KEY')
        ])->asForm()->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ]);

        return View('ongkir', ['results' => $response->json()]);
        // dd($response->json());
    }
}
