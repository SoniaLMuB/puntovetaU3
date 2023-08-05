@extends('layouts.app')

@section('titulo')
    Añadir usuario
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
                                <h4 class="mb-0 dark:text-white">Añadir usuario</h4>
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
                                            Información de usuario</p>
                                        <form action="{{ route('users.store') }}" method="POST" novalidate>
                                            @csrf
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="nombre"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">First
                                                            Name
                                                            </label>

                                                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                                                            placeholder="Ingrese nombre del usuario"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('nombre')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="lastname"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Last
                                                            Name</label>

                                                        <input type="text" name="lastname" value="{{ old('lastname') }}"
                                                            placeholder="Ingrese apellido del usuario"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('lastname')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="username"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Username</label>
                                                        <input type="text" name="username" value="{{ old('username') }}"
                                                            placeholder="Ingrese username del usuario"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('username')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="password"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Password</label>
                                                        <input type="password" name="password" value="{{ old('password') }}"
                                                            placeholder="Ingrese username del usuario"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('password')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-3">
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-6">
                                                        <label for="phone"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Phone
                                                        </label>
                                                        <input type="text" name="phone" value="{{ old('phone') }}"
                                                            placeholder="Ingrese teléfono"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('phone')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-6">
                                                        <label for="email"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Email
                                                        </label>

                                                        <input type="email" name="email" value="{{ old('email') }}"
                                                            placeholder="Ingrese email"
                                                            class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('email')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-6">
                                                        <label for="role"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Role</label>
                                                            <div class="relative">
                                                                <select
                                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                                    name="role" id="role">
                                                                    <option value="1" selected>Owner</option>
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
                                                        @error('role')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="status"
                                                            class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">
                                                            Status
                                                        </label>
                                                            <div class="relative">
                                                                <select
                                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                                    name="status" id="status">
                                                                    <option value="1" selected>Activo</option>
                                                                    <option value="0">Inactivo</option>
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
                                                        @error('status')
                                                            <p class="text-red-500 my-2 text-sm text-center">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            @error('imagen')
                                                <p class="text-red-500 my-2 text-sm text-center">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                            <input type="hidden" name="imagen">
                                            <div
                                                class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                                <div class="flex justify-end flex-wrap -mx-3">
                                                    <div class="flex-none w-2/2 max-w-full text-right">
                                                        <button type="submit"
                                                            class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25"
                                                            href="javascript:;"> <i class="fas fa-plus" aria-hidden="true">
                                                            </i>&nbsp;&nbsp;Registrar
                                                            usuario</button>
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
