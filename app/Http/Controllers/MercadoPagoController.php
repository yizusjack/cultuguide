<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Costo;
use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\Client\Preference\PreferenceClient;

class MercadoPagoController extends Controller
{
    public function generarOrdenEntrada(Request $request) {

        $request->validate([
            'costo_id' => 'required'
        ]);

        $costo = Costo::findOrFail($request->costo_id);

        $comision = $costo->costo * 0.05;

        $descuento = Auth::user()->cupones == 3
            ? $costo->costo * 0.5
            : $costo->costo * 0;

        $costo_total = ($costo->costo - $descuento) + $comision;

        // Sets access token from .env file.
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
        // Sets enviroment to localhost for testing.
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

        $client = new PreferenceClient();
        try {
            $preference = $client->create([
                "items" => [
                    [
                        "title" => "Entrada: " . $costo->categoria,
                        "quantity" => 1,
                        "unit_price" => $costo_total,
                    ]
                ],
                "back_urls" => [
                    'success' => route('mercadopago.success'),
                    'failure' => route('mercadopago.failure'),
                ],
                "auto_return" => 'approved',
            ]);
        }
        catch (MPApiException $error) {
            dump($error);
            return redirect()->route('mercadopago.failure');
        }


        return view('mercadopago.ordenEntrada', compact('costo', 'comision', 'descuento', 'costo_total', 'preference'));
    }

    public function success(Request $request) {
        $user = User::find(Auth::user()->id);
        if ($user->cupones == 3) {
            $user->cupones = 0;
        }
        else {
            $user->cupones += 1;
        }
        $user->save();
        return redirect()->route('lugar.index');
    }

    public function failure(Request $request) {
        return 'Hubo un error al comprar entrada';
    }
}
