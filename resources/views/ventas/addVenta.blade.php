@extends('layouts.app')

@section('titulo')
    Añadir venta
@endsection
<!-- Agrega el elemento a la stack en app.blade.php -->

@section('contenido_top')
    <div
        class="absolute bg-y-50 w-full top-0 bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg')] min-h-75">
        <span class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-60"></span>
    </div>
@endsection

@section('contenido')

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 md:w-7/12 md:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <h6 class="mb-4">Escoge los productos para la venta</h6>
                </div>

                <div class="mb-4 px-4">
                    <label for="categoria">Categoria:</label>
                    <select name="categoria" class="searchCat text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 @error('descripcion') border-red-500 @enderror bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="categoria...">
                    <option value="" selected>Selecciona una opción</option>
                    {{-- @if ($categories->count())
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->nombre}}</option>
                        @endforeach
                    @endif --}}
                    </select>
                </div>
            
                <div class="flex flex-wrap mb-4 px-4" id="productos">
                </div>
            </div>
            <br>
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                    <h6 class="mb-4">Productos</h6>
                </div>
    
                
                
                <div class="flex flex-wrap mb-4 px-4" id="productos">
                
                </div>
            </div>
        </div>

      <div class="w-full max-w-full px-3 md:w-5/12 md:flex-none">
        <div class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
            <div class="flex flex-wrap -mx-3">
              <div class="flex items-center justify-start max-w-full px-3 md:w-1/2 md:flex-none">
                <i class="mr-2 fa fa-shopping-cart" aria-hidden="true"></i>
                <h6 class="mb-0">Carrito</h6>
              </div>
              {{-- <div class="flex items-center justify-end max-w-full px-3 md:w-1/2 md:flex-none">
                <i class="mr-2 far fa-calendar-alt" aria-hidden="true"></i>
                 <small>{{ $fechaHoy->isoFormat('LL') }}</small> 
              </div> --}}
            </div>
          </div>

          <div class="flex-auto p-4 pt-6">
            <form action="#" method="POST" role="form text-left">
              @csrf
              <div class="mb-4">
                <label for="cliente">Cliente:</label>
                <select name="cliente" id="cliente" class="js-example-basic-single text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 @error('descripcion') border-red-500 @enderror bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="categoria...">
                  <option value="">Selecciona una opción</option>
                  {{-- @if ($clients->count())
                    @foreach ($clients as $client)
                      <option value="{{$client->id}}">{{$client->nombre}}</option>
                    @endforeach
                  @endif --}}
                </select>
                @error('categoria')
                  <span class="mt-1 py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-red-200 text-red-700 align-baseline font-bold uppercase leading-none">
                    {{$message}}
                  </span>
                @enderror
              </div>
              <div class="mb-4">
                <label for="referencia">Referencia:</label>
                <input type="text" name="referencia" id="referencia" value="{{old('referencia')}}" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 @error('codigo') border-red-500 @enderror bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Referencia..." aria-label="referencia" aria-describedby="email-addon" />
                @error('referencia')
                  <span class="mt-1 py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-red-200 text-red-700 align-baseline font-bold uppercase leading-none">
                    {{$message}}
                  </span>
                @enderror
              </div>

              <color:div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid rounded-2xl bg-clip-border">
                <div class="p-4 pb-2 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                      <h6 class="mb-0">Productos</h6>
                    </div>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                      <button type="button" id="clearAll" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">
                        Limpiar todo
                      </button>
                    </div>
                  </div>
                </div>
                <div class="flex-auto p-4 pb-0 overflow-y-auto h-64">
                  <ul class="flex flex-col pl-0 mb-0 rounded-lg" id="shopProductos">

                  </ul>
                </div>
              </color:div>


              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
                    <div class="flex items-center">
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-gray-700">Subtotal</h6>
                      </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <label for="subtotal"
                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">MX$0.00</label>
                      <input name="subtotal" id="subtotal" type="hidden" value="0">
                    </div>
                  </li>
                  <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                    <div class="flex items-center">
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-gray-700">IVA</h6>
                      </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <label for="iva"
                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">MX$0.00</label>
                        
                      <input name="iva" id="iva" type="hidden" value="0">
                    </div>
                  </li>
                  <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                    <div class="flex items-center">
                      <div class="flex flex-col">
                        <h6 class="mb-1 leading-normal text-sm text-gray-700">Total</h6>
                      </div>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                      <p id="labelTotal" class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 text-sm bg-clip-text">MX$0.00</p>
                      <input name="total" id="total" type="hidden" value="0">
                    </div>
                  </li>
                </ul>
              </div>
  
              <div class="text-center">
                <button type="submit" class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25">
                  Comprar
                </button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
</div>
@endsection
