<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costo;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

class MercadoPagoController extends Controller
{
    public function generarOrdenEntrada(Request $request) {
        $request->validate([
            'costo_id' => 'required'
        ]);

        $costo = Costo::findOrFail($request->costo_id);

        // Sets access token from .env file.
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
        // Sets enviroment to localhost for testing.
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

        $client = new PreferenceClient();
        $preference = $client->create([
            "items"=> array(
                array(
                    "title" => "Entrada: " . $costo->categoria,
                    "quantity" => 1,
                    "unit_price" => floatval($costo->costo),
                )
            ),
            "back_urls" => [
                'succes' => route('mercadopago.success'),
                'failure' => route('mercadopago.failure'),
            ],
        ]);


        return view('mercadopago.ordenEntrada', compact('costo', 'preference'));
    }

    public function success(Request $request) {
        return 'Éxito al comprar entrada';
    }

    public function failure(Request $request) {
        return 'Hubo un error al comprar entrada';
    }
}
