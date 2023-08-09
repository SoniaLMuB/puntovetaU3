@extends('layouts.app')

@section('titulo')
    Añadir proveedor
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
                                <h4 class="mb-0 dark:text-white">Añadir proveedor</h4>
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
                                            Información de proveedor</p>
                                        <form action="{{ route('supplier.create') }}" method="POST" novalidate>
                                            @csrf
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="nombre"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nombre
                                                            de proveedor</label>

                                                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                                                            placeholder="Ingrese nombre de proveedor"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('nombre')
                                                            <p class="text-red-500 my-2 rounded-lg text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="codigo"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Código</label>

                                                        <input type="text" name="codigo" value="{{ old('codigo') }}"
                                                            placeholder="Ingrese código de proveedor"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('codigo')
                                                            <p class="text-red-500 my-2 rounded-lg text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="telefono"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Teléfono</label>

                                                        <input type="text" name="telefono" value="{{ old('telefono') }}"
                                                            placeholder="Ingrese teléfono de proveedor"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('telefono')
                                                            <p class="text-red-500 my-2 rounded-lg text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="email"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email</label>

                                                        <input type="email" name="email" value="{{ old('email') }}"
                                                            placeholder="Ingrese email de proveedor"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('email')
                                                            <p class="text-red-500 my-2 rounded-lg text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="email"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            País
                                                        </label>
                                                        @error('pais')
                                                            <p class="text-red-500 my-2 rounded-lg text-sm p-2 text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                        <select
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-900 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                            name="pais" id="pais">
                                                            <option value="" {{ old('pais') ? '' : 'selected' }}>Seleccione</option>
                                                            @if ($paises && count($paises) > 0)
                                                                @foreach ($paises as $pais)
                                                                    <option value="{{ $pais->id }}" {{ (old('pais') == $pais->id) ? 'selected' : '' }}>
                                                                        {{ $pais->name }}
                                                                    </option>
                                                                @endforeach
                                                            @else
                                                                <option value="">No hay paises</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="ciudad"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Ciudad
                                                        </label>
                                                        <input type="text" name="ciudad" value="{{ old('ciudad') }}"
                                                            placeholder="Ingrese el nombre de la ciudad"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('ciudad')
                                                            <p class="text-red-500  my-2 rounded-lg text-sm p-2 text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            @error('imagen')
                                                <p class="text-red-500 my-2 rounded-lg text-sm text-center">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                            <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                                            <div
                                                class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                                <div class="flex justify-end flex-wrap -mx-3">
                                                    <div class="flex-none w-2/2 max-w-full text-right">
                                                        <button type="submit"
                                                            class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25"
                                                            href="javascript:;"> <i class="fas fa-plus" aria-hidden="true">
                                                            </i>&nbsp;&nbsp;Registrar
                                                            proveedor</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
