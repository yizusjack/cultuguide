<x-layout
    name="Orden entrada"
>
    <div class="text-center">
        <h1>Orden de entrada tipo {{ $costo->categoria }} para {{ $costo->lugar->nombre }}</h1>
    </div>

    <div class="row">
        <div>
            Precio: ${{ $costo->costo }} mxn.
        </div>

        <div>
            Comisión: ${{ $comision }} mxn.
        </div>

        @if ($descuento > 0.0)
            <div>
                Descuento: ${{ $descuento }} mxn.
            </div>
        @endif

        <div>
            Total: ${{ $costo_total }} mxn.
        </div>

        <div>
            Tipo de entrada: {{ $costo->categoria }}.
        </div>
        <div id="wallet_container"></div>
    </div>

    @section('js')
        {{-- Mercado pago --}}
        <script src="https://sdk.mercadopago.com/js/v2"></script>

        <script>
            const mp = new MercadoPago("{{ config('services.mercadopago.public_key') }}", {
                locale: "es-MX",
            });
            const bricksBuilder = mp.bricks().create("wallet", "wallet_container", {
                initialization: {
                    preferenceId: "{{ $preference->id }}",
                    redirectMode: "modal",
                },
                customization: {
                    texts: {
                        valueProp: 'smart_option',
                    },
                },
            });
        </script>
    @endsection
</x-layout>
