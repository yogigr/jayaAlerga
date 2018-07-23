<?php

namespace App\Traits;

use File;
use Auth;

trait OngkirTrait
{
	private function getOngkirJson($carts)
    {
        File::delete(database_path('json/ongkir.json'));
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=252&destination=".Auth::user()->city->id."&weight=".$this->totalBerat($carts)."&courier=jne",
            CURLOPT_HTTPHEADER => [
                "content-type: application/x-www-form-urlencoded",
                "key: " . env('RAJAONGKIR_KEY') 
                ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            File::put(database_path('json/ongkir.json'), $err);
        } else {
            File::put(database_path('json/ongkir.json'), $response);
        }
    }

    private function daftarLayananJne()
    {
        $file = File::get(database_path('json/ongkir.json'));
        $data = json_decode($file);

        if (!is_null($data)) {
            $response = [];
            if ($data->rajaongkir) {
                $response ['status'] = $data->rajaongkir->status->code;
                if ($data->rajaongkir->status->code == 200) {
                    foreach ($data->rajaongkir->results[0]->costs as $d) {
                       $response['layanan'][$d->service] = $d->cost[0]->value; 
                    } 
                }
                return $response;
            }
        }
        return null;
    }
}