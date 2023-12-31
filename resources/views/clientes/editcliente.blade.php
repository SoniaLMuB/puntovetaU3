@extends('layouts.app')

@section('titulo')
    Editar Cliente
@endsection
<!-- Agrega el elemento a la stack en app.blade.php -->
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

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
                                <h4 class="mb-0 dark:text-white">Editar cliente</h4>
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
                                            Información del cliente</p>
                                        @foreach ($cliente as $clienteInfo)
                                            <form action="{{ route('clientes.update') }}" method="POST" novalidate>
                                                @csrf
                                                <input type="hidden" name="id" id="id_marca" value="{{$clienteInfo->id}}">
                                                <div class="flex flex-wrap -mx-3">
                                                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="nombre"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre
                                                                del cliente</label>
                                                            @error('nombre')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <input type="text" name="nombre" value="{{$clienteInfo->nombre}}"
                                                                placeholder="Ingrese nombre del cliente"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        </div>
                                                    </div>
                                                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="codigo"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                Código
                                                            </label>
                                                            @error('codigo')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <input type="number" name="codigo" value="{{$clienteInfo->codigo}}"
                                                                placeholder="Ingrese el codigo del cliente"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        </div>
                                                    </div>
                                                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="empresa"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                Empresa
                                                            </label>
                                                            @error('empresa')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <input type="text" name="empresa" value="{{$clienteInfo->empresa}}"
                                                                placeholder="Ingrese la empresa del cliente"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        </div>
                                                    </div>
                                                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="telefono"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                Telefono
                                                            </label>
                                                            @error('telefono')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <input type="number" name="telefono" value="{{$clienteInfo->telefono}}"
                                                                placeholder="Ingrese el telefono del cliente"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        </div>
                                                    </div>
                                                    <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="email"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                Correo eléctronico
                                                            </label>
                                                            @error('email')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <input type="email" name="email" value="{{$clienteInfo->email}}"
                                                                placeholder="Ingrese el telefono del cliente"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        </div>
                                                    </div>
                                                    <div class="w-1/2 max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="email"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                País
                                                            </label>
                                                            @error('pais')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <select value="{{ $clienteInfo->pais->id }}"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                                name="pais" id="pais">
                                                                <option value="">Seleccione</option>
                                                                @if (count($paises) > 0)
                                                                    @foreach ($paises as $pais)
                                                                        <option value="{{ $pais->id }}"
                                                                            {{ $pais->id == $clienteInfo->pais_id ? 'selected' : '' }}>
                                                                            {{ $pais->name }}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="">No hay categorias</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-1/2 max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="ciudad"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                Ciudad
                                                            </label>
                                                            @error('ciudad')
                                                                <p
                                                                    class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                            <input type="text" name="ciudad" value="{{$clienteInfo->ciudad}}"
                                                                placeholder="Ingrese el nombre de la ciudad"
                                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        </div>
                                                    </div>
                                                    <div class="w-1/2 max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                                        <div class="mb-4">
                                                            <label for="descripcion"
                                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                                Descripción
                                                            </label>
                                                            <textarea style="color:black" name="descripcion" 
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg 
                                                                border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all
                                                                placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"  
                                                            placeholder="Ingrese la descripción del cliente">{{$clienteInfo->descripcion}}
                                                            </textarea>
                                                            @error('descripcion')
                                                                <p class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                    {{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @error('imagen')
                                                        <p
                                                            class=" text-red-500 my-2 rounded-lg text-sm p-2 text-center">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="imagen" value="{{$clienteInfo->imagen}}">
                                                <div
                                                    class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                                    <div class="flex justify-end flex-wrap -mx-3">
                                                        <div class="flex-none w-2/2 max-w-full text-right">
                                                            <button type="submit"
                                                                class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25"
                                                                href="javascript:;"> <i class="fas fa-plus" aria-hidden="true">
                                                                </i>&nbsp;&nbsp;Actualizar
                                                                Cliente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 mt-0 md:w-5/12 lg:flex-none">
                                <div
                                    class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                                    <div class="flex-auto p-4">
                                        <form action="{{ route('imagen.store') }}" method="POST"
                                            enctype="multipart/form-data" id="dropzone"
                                            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                                            @csrf
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
@endsection
