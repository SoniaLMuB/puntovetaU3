@extends('layouts.app')

@section('titulo')
    Detalle producto
@endsection

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h4 class="mb-0 dark:text-white">Detalle producto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <!-- cards row 3 -->
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-850  dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                                    <div class="flex-auto p-6">
                                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                            Información de producto</p>
                                        <form novalidate>
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="nombre"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre
                                                            de producto</label>
                                                        <input value="{{$producto->nombre}}" readonly type="text" name="nombre"
                                                            placeholder="Ingrese nombre de producto"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="codigo"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Código</label>
                                                        <input readonly type="text" name="codigo" value="{{$producto->codigo}}"
                                                            placeholder="Ingrese código del producto"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="categoria"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Categoria</label>
                                                            <input readonly type="text" name="precio_venta" 
                                                            placeholder="Ingrese precio" value="{{$producto->categoria->nombre}}"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="marca"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Marca</label>
                                                            <input readonly type="text" name="precio_venta" value="{{$producto->marca->nombre}}"
                                                            placeholder="Ingrese precio"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" /> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="precio_venta"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Precio
                                                            venta</label>
                                                        <input readonly type="number" name="precio_venta" value="{{$producto->precio_venta}}"
                                                            placeholder="Ingrese precio"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="precio_compra"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Precio
                                                            Compra</label>
                                                        <input readonly type="number" name="precio_compra" value="{{$producto->precio_compra}}"
                                                            placeholder="Ingrese precio"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="stock"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Stock</label>
                                                        <input readonly type="number" name="stock" placeholder="Ingrese stock" value="{{$producto->stock}}"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input readonly type="hidden" name="imagen">
                                            <div
                                                class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                                <div class="flex justify-end flex-wrap -mx-3">
                                                    <div class="flex-none w-2/2 max-w-full text-right">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-4 mt-0 lg:w-5/12 lg:flex-none">
                                <div
                                    class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                                    <div class="flex-auto p-4">
                                        <div class="md:w-2/2">
                                            <img class="h-auto max-w-full" src="{{ asset('uploads') . '/' . $producto->imagen }}" alt="">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
