<x-layout
    title="Usuarios"
>
    
    <div class="text-center">
        <h1>Usuarios</h1>
    </div>

    <div>
        <livewire:listados.user-list/>
    </div>

    @section('js')
        {{--<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
        @if(session('mensaje'))
            <script>
                Swal.fire(
                    '{{ session('type') == 'error' ? "Error :(" : "Exito :)" }}',
                    '{{ session('mensaje') }}',
                    '{{ session('type') }}'
                )
            </script>
        @endif
        {{--@if(session('gimnasta')== 'eliminada')
            <script>
                Swal.fire(
                    '¡Éxito!',
                    'Registro elimnado.',
                    'error'
                )
            </script>
        @endif--}}
    @endsection

</x-layout>