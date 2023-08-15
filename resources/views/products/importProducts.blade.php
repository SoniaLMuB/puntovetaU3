@extends('layouts.app')
@section('titulo')
    Importar productos
@endsection

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

<!-- Agrega el elemento a la stack en app.blade.php -->
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div id="app" data-url="{{ route('importar.store') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->
            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <div class="flex flex-wrap -mx-3">
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h4 class="mb-0 dark:text-white">Importar productos</h4>
                                </div>
                            </div>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <form id="csv-upload-form" class="p-4 space-y-4" action="{{ route('importar.store') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="relative">
                                        <label for="csv-file" class="block text-sm font-medium text-gray-700">Selecciona el
                                            archivo CSV</label>
                                        <input type="file" name="csv-file" accept=".csv"
                                            class="mt-1 block w-full border rounded-md shadow-sm py-2 px-3 focus:ring focus:ring-opacity-50">
                                    </div>
                                    <div>
                                        <button type="submit" id="upload-button"
                                            class=" mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Subir
                                            CSV</button>
                                    </div>
                                </form>
                            </div>
                            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                                <h4 class="text-xl font-bold mb-4">Instrucciones para la importación:</h4>
                                <p class="mb-4">Asegúrate de que tu archivo CSV siga la siguiente estructura:</p>
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr>
                                            <th
                                                class="py-2 px-4 border-b border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Columna</th>
                                            <th
                                                class="py-2 px-4 border-b border-gray-300 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">nombre</td>
                                            <td class="py-2 px-4 border-b border-gray-300">Nombre del producto</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">categoria_id</td>
                                            <td class="py-2 px-4 border-b border-gray-300">ID de la categoría del producto
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">marca_id</td>
                                            <td class="py-2 px-4 border-b border-gray-300">ID de la marca del producto</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">codigo</td>
                                            <td class="py-2 px-4 border-b border-gray-300">Código único del producto</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">stock</td>
                                            <td class="py-2 px-4 border-b border-gray-300">Cantidad de stock del producto
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">precio_venta</td>
                                            <td class="py-2 px-4 border-b border-gray-300">Precio de venta del producto</td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-300">precio_compra</td>
                                            <td class="py-2 px-4 border-b border-gray-300">Precio de compra del producto
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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
@endsection
