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
        <
        <!-- table 1 -->
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
                        <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                            <h5 class="mb-0 dark:text-white">SL0101</h5>
                        </div>
                        <br>
                        <div class="flex">
                            
                            <div class="flex-1 px-3">
                                
                                <h6>Información del cliente</h6>
                                <!--Nombre del cliente -->
                                <p>Sonia</p>
                                <!--correo del cliente -->
                                <p>sonia@gmail.com</p>
                                <!--Nombre del cliente -->
                                <p>12345678</p>
                                <!--dirección del cliente -->
                                <p>Cd Victoria</p>
                            </div>
                            <div class="flex-1 px-3">
                                
                                <h6>Información de la compañía</h6>
                                <!--Nombre de la companía -->
                                <p>DGT</p>
                                <!--correo de la compañía -->
                                <p>ejemplo@gmail.com</p>
                                <!--Nombre de la compañia -->
                                <p>876321</p>
                                <!--dirección de la compañia -->
                                <p>CDMX</p>
                            </div>
                            <div class="flex-1 px-3">
                                <h6>Información de la factura</h6>
                                <div class="flex justify-between">
                                    <p>Rerefencia</p>
                                    <p class="text-right" >SL0101</p>
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
                    </div>
                    <br>
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
                                            Descuento
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            TAX
                                        </th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Subtotal
                                        </th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('uploads/ce39afe5-b51e-4237-9e65-ea46f0beb589.jpg')}}"
                                                    class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                    alt="user1" />
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                    Computadora
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            1
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            15000.00
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            0.00
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            0.00
                                    </td>
                                    <td
                                        class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            1500.00
                                    </td>
                                    
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
