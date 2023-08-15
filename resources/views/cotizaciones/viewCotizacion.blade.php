@extends('layouts.app')

@section('titulo')
    Detalle cotizacion
@endsection
<!-- Agrega el elemento a la stack en app.blade.php -->

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')
    <style>
        table td,
        table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h4 class="mb-0 dark:text-white">Detalle cotizacion</h4>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <!-- cards row 3 -->
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-12/12 lg:flex-none">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850  dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                                    <div class="flex-auto p-6">
                                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                            Información de cotizacion</p>
                                        <form action="{{ route('cotizaciones.create') }}" method="POST" novalidate>
                                            @csrf

                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="proveedor"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Nombre de proveedor
                                                        </label>
                                                        <input readonly type="text" name="proveedor"
                                                            value="{{ $cotizacion->supplier->nombre }}"
                                                            placeholder="Ingrese código del producto"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('proveedor')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="fecha"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Fecha de cotizacion
                                                        </label>

                                                        <input readonly type="date" name="fecha"
                                                            value="{{ $cotizacion->fecha }}"
                                                            placeholder="Ingrese código del producto"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('fecha')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="referencia"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Numero
                                                            de referencia</label>
                                                        <input readonly type="text" name="referencia"
                                                            value="{{ $cotizacion->referencia }}"
                                                            placeholder="Ingrese código del producto"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('referencia')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="my-4 space-x-2 y-2" style="display: flex; justify-content:end; margin-right: 20px;">
                                                    <button type="button" onclick="exportToPDF('DetalleVenta')"
                                                        class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25 mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                            <path fill-rule="evenodd"
                                                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                        </svg>
                                                    </button>
                            
                                                    <button type="button" onclick="exportarXLSX('DetalleVenta')"
                                                        class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                            class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="flex-auto px-0 pt-0 pb-2 w-full">
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
                                                                        Stock
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Stock cotizado
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Precio de cotizacion
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Impuestos
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Costo unitario
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Costo Total
                                                                    </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($detalle_cotizacion as $dato)                                                                           
                                                                    
                                                                    <tr id="producto_${productoSeleccionado.id}">
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent.">
                                                                            <div class="flex px-2 py-1">
                                                                                <div>
                                                                                    <img src="{{ asset('uploads') . '/' . $dato->producto->imagen}}"
                                                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                                                        alt="${productoSeleccionado.nombre}" />
                                                                                </div>
                                                                                <div class="flex flex-col justify-center">
                                                                                    <h6
                                                                                        class="mb-0 text-sm leading-normal dark:text-white">
                                                                                        {{$dato->producto->nombre}}
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                            {{$dato->producto->stock}}
                                                                        </td>
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent stock-nuevo">
                                                                            {{$dato->stock}}
                                                                        </td>
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                            {{$dato->precio_compra}}
                                                                        </td>
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                            {{round(($dato->precio_compra*$dato->stock)*0.15)}}
                                                                        </td>
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                                            {{$dato->producto->precio_venta}}
                                                                        </td>
                                                                        <td
                                                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent costo-total">
                                                                            {{$cotizacion->total}}
                                                                        </td>

                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="w-full">
                                                    <div class="flex">

                                                        <div class="flex-1 px-3">
                                                            <p>Gran Total</p>
                                                        </div>
                                                        <div class="flex-1 px-3">
                                                            <p id="sumaCostoTotal"> $ {{ $cotizacion->total }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <input type="hidden" name="costo_total" id="inputCostoTotal"
                                                    value="0">
                                                <!--
                                                        <div class="flex flex-wrap w-full">
                                                            <div class="mb-4 w-1/4  md:w-1/3 px-3">
                                                                <label for="nombre"
                                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                    Impuesto de pedido
                                                                </label>
                                                                <div class="relative">
                                                                    <input type="text" name="impuestoPedido"
                                                                        value="{{ old('impuestoPedido') }}"
                                                                        placeholder="Ingrese el impuesto"
                                                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                                </div>
                                                                @error('impuestoPedido')
        <p class="text-red-500 my-2 text-sm text-center">
                                                                                {{ $message }}
                                                                            </p>
    @enderror
                                                            </div>
                                                            <div class="mb-4 w-1/4  md:w-1/3 px-3">
                                                                <label for="fecha"
                                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                    Descuento
                                                                </label>
                                                                <div class="relative">
                                                                    <input type="text" name="descuentoPedido"
                                                                        value="{{ old('descuentoPedido') }}"
                                                                        placeholder="Ingrese el descuento"
                                                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                                </div>
                                                                @error('descuentoPedido')
        <p class="text-red-500 my-2 text-sm text-center">
                                                                                {{ $message }}
                                                                            </p>
    @enderror
                                                            </div>
                                                            <div class="mb-4 w-1/4 md:w-1/3 px-3">
                                                                <label for="referencia"
                                                                    class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Envío</label>
                                                                <input type="number" name="envio" value="{{ old('envio') }}"
                                                                    placeholder="Ingrese la cantidad del envío"
                                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                                @error('envio')
        <p class="text-red-500 my-2 text-sm text-center">
                                                                                {{ $message }}
                                                                            </p>
    @enderror
                                                            </div>
                                                        </div>
                                                    -->
                                                <div class="mb-4 w-full">
                                                    <label for="nombre"
                                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                        Descripción
                                                    </label>
                                                    <div class="relative">
                                                        <textarea name="descripcion" readonly
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 
                                                                ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white 
                                                                bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all
                                                                placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                                                {{ $cotizacion->descripcion }}
                                                            </textarea>

                                                    </div>
                                                    @error('descripcion')
                                                        <p class="text-red-500 my-2 text-sm text-center">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div
                                                class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            var productoSeleccionado = null;
            //Funcion para que cada vez que se seleccione un producto se consulte la informacion en el controlador
            $('#productos').change(function() {
                var productoId = $(this).val();
                var urlProducto = "{{ route('cotizaciones.getProducto', ['id_producto' => 'ID_PRODUCTO']) }}"
                    .replace('ID_PRODUCTO', productoId);
                if (productoId) {
                    $.ajax({
                        url: urlProducto,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            productoSeleccionado = data;
                        },
                        error: function(error) {
                            swal("Error!",
                                "Hubo un error al obtener los detalles del producto.",
                                "error");
                        }
                    });
                }
            });
            //Funcion para añadir el stock a la tabla y a los inputs escodidos en el formulario
            $("#add_stock").click(function() {
                var stock = $("input[name='stock']").val();

                if (productoSeleccionado && stock && stock > 0) {
                    var productoExistente = $(`#producto_${productoSeleccionado.id}`);

                    if (productoExistente.length) {
                        // Si el producto ya está en la tabla, suma el stock al stock añadido
                        var stockAnadidoActual = parseInt(productoExistente.find(".stock-nuevo").text());
                        var nuevoStockAnadido = stockAnadidoActual + parseInt(stock);

                        productoExistente.find(".stock-nuevo").text(nuevoStockAnadido);
                        // Calcula el nuevo costo total
                        var nuevoCostoTotal = nuevoStockAnadido * productoSeleccionado.precio_compra;

                        // Actualiza la celda del "costo total"
                        productoExistente.find(".costo-total").text(nuevoCostoTotal);
                        actualizarSumaTotalCosto();
                        // Actualiza el input oculto del stock
                        $(`input[name='stocks_${productoSeleccionado.id}']`).val(nuevoStockAnadido);
                    } else {
                        // Añadir fila a la tabla si el producto no existe en ella
                        var fila = `
                    <tr id="producto_${productoSeleccionado.id}">
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent.">
                            <div class="flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('uploads') }}/${productoSeleccionado.imagen}"  class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" alt="${productoSeleccionado.nombre}" />
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">${productoSeleccionado.nombre}</h6>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${productoSeleccionado.stock}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent stock-nuevo">${stock}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${productoSeleccionado.precio_compra}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${Math.round((productoSeleccionado.precio_compra*stock)*0.15)}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${productoSeleccionado.precio_venta}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent costo-total">${productoSeleccionado.precio_compra*stock}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                `;
                        $('#tablaProductos tbody').append(fila);
                        actualizarSumaTotalCosto();

                        // Generar inputs ocultos
                        var inputProducto =
                            `<input type="hidden" name="producto_ids[]" value="${productoSeleccionado.id}">`;
                        var inputStock = `<input type="hidden" name="stocks[]" value="${stock}">`;

                        $("form").append(inputProducto);
                        $("form").append(inputStock);
                    }

                    // Limpiar selección e input
                    $("#productos").val('');
                    $("input[name='stock']").val('');
                    productoSeleccionado = null;
                } else {
                    swal("Error!", "Por favor, selecciona un producto y añade un stock válido", "error");
                }
            });
            // Función para actualizar la suma total del costo
            function actualizarSumaTotalCosto() {
                var sumaTotal = 0;

                // Recorre todas las celdas de "costo total" y suma sus valores
                $(".costo-total").each(function() {
                    sumaTotal += parseFloat($(this).text());
                });

                // Actualiza la etiqueta <p> y el input con el valor calculado
                $("#sumaCostoTotal").text("$" + sumaTotal);
                $("#inputCostoTotal").val(sumaTotal);
            }
        });
    </script>
@endsection
