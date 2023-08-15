@extends('layouts.app')
@section('titulo')
    Detalles de venta
@endsection

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')
    <div class="w-full px-6 py-6 mx-auto">
        < <!-- table 1 -->
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <div class="flex flex-wrap -mx-3">
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h4 class="mb-0 dark:text-white">Detalles de venta</h4>
                                </div>

                            </div>
                        </div>
                        <br>

                        <div class="w-full">
                            @foreach ($venta as $dato)
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h5 class="mb-0 dark:text-white">{{ $dato->referencia }}</h5>
                                </div>
                                <br>
                                <div class="flex">

                                    <div class="flex-1 px-3">

                                        <h6>Información del cliente</h6>
                                        <!--Nombre del cliente -->
                                        <p>{{ $dato->cliente->nombre }}</p>
                                        <!--correo del cliente -->
                                        <p>{{ $dato->cliente->email }}</p>
                                        <!--Nombre del cliente -->
                                        <p>{{ $dato->cliente->telefono }}</p>
                                        <!--dirección del cliente -->
                                        <p>{{ $dato->cliente->ciudad }}</p>
                                    </div>
                                    <!--
                                                                                            <div class="flex-1 px-3">

                                                                                                <h6>Información de la compañía</h6>
                                                                                                <p>DGT</p>
                                                                                                <p>ejemplo@gmail.com</p>
                                                                                                <p>876321</p>
                                                                                                <p>CDMX</p>
                                                                                            </div>
                                                                                        -->
                                    <div class="flex-1 px-3">
                                        <h6>Información de la factura</h6>
                                        <div class="flex justify-between">
                                            <p>Rerefencia</p>
                                            <p class="text-right">{{ $dato->referencia }}</p>
                                        </div>
                                        <div class="flex justify-between">
                                            <p>Estado de pago</p>
                                            <p class="text-right" style="color: green">Pagado</p>
                                        </div>
                                        <div class="flex justify-between">
                                            <p>Estado</p>
                                            <p class="text-right" style="color: green">Pagado</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="my-4 space-x-2 y-2" style="display: flex; justify-content:end; margin-right: 20px;">
                            <button onclick="exportToPDF('Venta - {{ $dato->referencia }}')"
                                class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                </svg>
                            </button>
                            <button onclick="exportarXLSX('Venta - {{ $dato->referencia }}')"
                                class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table id="table1"
                                    class="table table-striped items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Producto
                                            </th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                QTY
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Precio
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Subtotal
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Total
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Status
                                            </th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detalle as $data)
                                            <tr>
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('uploads') . '/' . $data->producto->imagen }}"
                                                                class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                                alt="user1" />
                                                        </div>
                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                                {{ $data->producto->nombre }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    {{ $data->cantidad }}
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    {{ $data->producto->precio_compra }}
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    {{ $data->cantidad * $data->producto->precio_compra }}
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    {{ $data->cantidad * $data->producto->precio_compra * 1.16 }}
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    @if ($data->cantidad <= 0)
                                                        <button
                                                            class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white 
                                                align-middle transition-all rounded-lg cursor-pointer text-sm ease-in shadow-md 
                                                bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem 
                                                bg-x-25"
                                                            style="background-color: #e21001">
                                                            Devuelto
                                                        </button>
                                                    @else
                                                        <button
                                                            class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white 
                                        align-middle transition-all rounded-lg cursor-pointer text-sm ease-in shadow-md 
                                        bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem 
                                        bg-x-25"
                                                            style="background-color: #1ddc16">
                                                            Vendido
                                                        </button>
                                                    @endif
                                                </td>
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    @if ($data->cantidad <= 0)
                                                        Devolución completa
                                                    @else
                                                        <button class="btn-delete" data-id="{{ $data->id }}"
                                                            data-confirm-delete="true">
                                                            <form id="delete-form-{{ $data->id }}"
                                                                action="{{ route('ventas.devolver') }}" method="POST"
                                                                style="display: none;">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
                                                                <input type="hidden" name="producto_id"
                                                                    value="{{ $data->producto->id }}">
                                                                <input type="hidden" name="qty"
                                                                    value="{{ $data->cantidad }}">

                                                            </form>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                                class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                                                            </svg>
                                                        </button>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();

                    const id = button.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${id}`);
                    const maxQty = form.querySelector('[name="qty"]').value;

                    Swal.fire({
                        title: 'Devolución de Producto',
                        input: 'number',
                        inputAttributes: {
                            min: 1,
                            max: maxQty,
                            step: 1
                        },
                        text: `Ingrese la cantidad a devolver (max ${maxQty}):`,
                        showCancelButton: true,
                        confirmButtonText: 'Devolver',
                        inputValidator: (value) => {
                            if (!value) {
                                return '¡Necesitas ingresar una cantidad!';
                            }
                            if (parseInt(value) > parseInt(maxQty)) {
                                return `La cantidad máxima a devolver es ${maxQty}`;
                            }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.querySelector('[name="qty"]').value = result.value;
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
