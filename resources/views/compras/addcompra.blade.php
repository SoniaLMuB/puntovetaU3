@extends('layouts.app')

@section('titulo')
    Añadir compra
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
                                <h4 class="mb-0 dark:text-white">Añadir compra</h4>
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
                                            Información de compra</p>
                                        <form action="{{ route('compras.create') }}" method="POST" novalidate>
                                            @csrf
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="proveedor"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Nombre de proveedor
                                                        </label>
                                                        <div class="relative">
                                                            <select
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                                name="proveedor" id="proveedor">
                                                                <option value="">Seleccione</option>
                                                                @foreach ($proveedores as $proveedor)
                                                                    <option value="{{ $proveedor->id }}">
                                                                        {{ $proveedor->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div
                                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                                <svg class="fill-current h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                    <path d="M6 8l4 4 4-4" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                        </div>
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
                                                            Fecha de compra
                                                        </label>

                                                        <input type="date" name="fecha" value="{{ old('fecha') }}"
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
                                                        <input type="text" name="referencia"
                                                            value="{{ old('referencia') }}"
                                                            placeholder="Ingrese código del producto"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('referencia')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="marca"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Producto</label>

                                                        <div class="relative">
                                                            <select
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                                name="producto" id="productos">
                                                                <option value="">Seleccione</option>
                                                                @foreach ($productos as $producto)
                                                                    <option value="{{ $producto->id }}">
                                                                        {{ $producto->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div
                                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                                <svg class="fill-current h-4 w-4"
                                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                    <path d="M6 8l4 4 4-4" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        @error('producto')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="stock"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Stock
                                                            a añadir</label>
                                                        <input type="number" name="stock" value="{{ old('stock') }}"
                                                            placeholder="Ingrese stock a añadir"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('stock')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="stock"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Precio compra
                                                        </label>
                                                        <input type="number" name="precio_compra"
                                                            value="{{ old('precio_compra') }}"
                                                            placeholder="Ingrese precio compra a añadir"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('precio_compra')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0"
                                                    style="display: flex; justify-content:end;">
                                                    <div class="mb-4">
                                                        <button id="add_stock" type="button"
                                                            class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25"
                                                            href="javascript:;"> <i class="fas fa-plus"
                                                                aria-hidden="true">
                                                            </i>&nbsp;&nbsp;Añadir
                                                            producto
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex-auto px-0 pt-0 pb-2 w-full">
                                                    <div class="p-0 overflow-x-auto">
                                                        <table id="tablaProductos"
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
                                                                        Stock añadido
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Precio de compra
                                                                    </th>
                                                                    <th
                                                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Precio de compra nuevo
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
                                                                    <th
                                                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                                        Acción
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

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
                                                            <p id="sumaCostoTotal"> $ 0.00</p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <input type="hidden" name="costo_total" id="inputCostoTotal"
                                                    value="0">
                                                <div class="mb-4 w-full">
                                                    <label for="nombre"
                                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                        Descripción
                                                    </label>
                                                    <div class="relative">
                                                        <textarea name="descripcion" id=""
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 
                                                                ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white 
                                                                bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all
                                                                placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                                            
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
                                            <div class="flex justify-end flex-wrap -mx-3">
                                                <div class="flex-none w-2/2 max-w-full text-right">
                                                    <button type="submit"
                                                        class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25"
                                                        href="javascript:;"> <i class="fas fa-plus" aria-hidden="true">
                                                        </i>&nbsp;&nbsp;Registrar compra
                                                    </button>
                                                </div>
                                            </div>
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
                var urlProducto = "{{ route('compras.getProducto', ['id_producto' => 'ID_PRODUCTO']) }}"
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
                var precioCompraModificado = $("input[name='precio_compra']")
                    .val(); // Obtener el precio de compra modificado

                if (productoSeleccionado && stock && stock > 0 && precioCompraModificado > 0) {
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
                        productoExistente.find(".precio-compra-modificado").text(precioCompraModificado);

                        actualizarSumaTotalCosto();
                        // Actualiza el input oculto del stock
                        $(`input[name='stocks_${productoSeleccionado.id}']`).val(nuevoStockAnadido);
                        // Actualiza el input oculto del precio de compra
                        $(`input[name='precios_compra_${productoSeleccionado.id}']`).val(
                            precioCompraModificado);
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
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${precioCompraModificado}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${Math.round((precioCompraModificado*stock)*0.15)}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">${productoSeleccionado.precio_venta}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent costo-total">${precioCompraModificado*stock}</td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent"">
                            <button type="button" class="btn-borrar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                `;
                        $('#tablaProductos tbody').append(fila);
                        actualizarSumaTotalCosto();

                        // Generar inputs ocultos
                        var inputProducto =
                            `<input type="hidden" name="producto_ids[]" value="${productoSeleccionado.id}">`;
                        var inputStock = `<input type="hidden" name="stocks[]" value="${stock}">`;
                        var inputPrecioCompra =
                            `<input type="hidden" name="precios_compra[]" value="${precioCompraModificado}">`; // Nuevo input escondido

                        $("form").append(inputProducto);
                        $("form").append(inputStock);
                        $("form").append(inputPrecioCompra);  // Añadir el nuevo input al formulario

                    }

                    // Limpiar selección e input
                    $("#productos").val('');
                    $("input[name='stock']").val('');
                    $("input[name='precio_compra']").val('');

                    productoSeleccionado = null;
                } else {
                    swal("Error!", "Por favor, selecciona un producto, añade un stock o precio de compra válido", "error");
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
            // Función para eliminar un producto de la tabla y sus inputs correspondientes
            $(document).on('click', '.btn-borrar', function(e) {
                e.preventDefault();

                // Obtiene el ID del producto desde el atributo de la fila
                var productoId = $(this).closest('tr').attr('id').replace('producto_', '');

                // Elimina la fila de la tabla
                $(this).closest('tr').remove();

                // Elimina los inputs ocultos relacionados con este producto
                $(`input[name='producto_ids[]'][value='${productoId}']`).remove();
                $(`input[name='stocks_${productoId}']`).remove();
                $(`input[name='precios_compra_${productoId}']`).remove();  // Línea añadida para eliminar el input de precio de compra modificado

                // Actualiza la suma total del costo después de borrar el producto
                actualizarSumaTotalCosto();
            });
        });
    </script>
@endsection
