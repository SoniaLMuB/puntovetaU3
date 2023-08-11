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
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <h6 class="mb-4">Escoge los productos para la venta</h6>
                    </div>
                    <div class="mb-4 px-4">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria"
                            class="searchCat text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 @error('descripcion') border-red-500 @enderror bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            placeholder="categoria...">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="all">Todos los productos</option>
                            @if ($categorias->count())
                                @foreach ($categorias as $category)
                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <br>
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                        <h6 class="mb-4">Productos</h6>
                    </div>
                    <div class="container max-w-7xl mx-auto px-4" style="cursor: auto;">
                        <div class="flex flex-wrap" id="productos">
                            <!--
                                                                                                        <div class="w-full md:w-4/12 lg:w-3/12 lg:mb-0 mb-3 p-4">
                                                                                                            <div class="p-4 shadow-2xl rounded-xl">
                                                                                                                <img alt="John Doe" src="https://dummyimage.com/300"
                                                                                                                    class="rounded-xl shadow-lg max-w-full h-auto align-middle border-none">
                                                                                                                <div class="pt-3 text-center">
                                                                                                                    <h4 class="text-gray-900 font-serif font-bold leading-normal mt-0 mb-0">
                                                                                                                        John Doe
                                                                                                                    </h4>
                                                                                                                    <p class="text-blue-gray-700 text-base font-light leading-relaxed mt-0 mb-2">
                                                                                                                        CEO
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        --->
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 md:w-5/12 md:flex-none">
                <div
                    class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
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
                        <form action="{{route('ventas.create')}}" method="POST" id="formVenta" role="form text-left">
                            @csrf
                            <div class="mb-4">
                                <label for="cliente">Cliente:</label>
                                <select name="cliente" id="cliente"
                                    class="js-example-basic-single text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 @error('descripcion') border-red-500 @enderror bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                    placeholder="categoria...">
                                    <option value="">Selecciona una opción</option>
                                    @if ($clientes->count())
                                        @foreach ($clientes as $client)
                                            <option value="{{ $client->id }}">{{ $client->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('categoria')
                                    <span
                                        class="mt-1 py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-red-200 text-red-700 align-baseline font-bold uppercase leading-none">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="referencia">Referencia:</label>
                                <input type="text" name="referencia" id="referencia" value="{{ old('referencia') }}"
                                    class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 @error('codigo') border-red-500 @enderror bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                    placeholder="Referencia..." aria-label="referencia" aria-describedby="email-addon" />
                                @error('referencia')
                                    <span
                                        class="mt-1 py-2.2 px-3.6 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-red-200 text-red-700 align-baseline font-bold uppercase leading-none">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div
                                class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid rounded-2xl bg-clip-border">
                                <div
                                    class="p-4 pb-2 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <div class="flex flex-wrap -mx-3">
                                        <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                            <h6 class="mb-0">Productos</h6>
                                        </div>
                                        <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                            <button type="button" id="clearAll"
                                                class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">
                                                Eliminar productos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-auto p-4 pb-0 overflow-y-auto h-64">
                                    <ul class="flex flex-col pl-0 mb-0 rounded-lg" id="shopProductos">

                                    </ul>
                                </div>
                            </div>
                            <div class="flex-auto p-4 pt-6">
                                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                    <li
                                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-inherit rounded-xl">
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
                                    <li
                                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
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
                                    <li
                                        class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                                        <div class="flex items-center">
                                            <div class="flex flex-col">
                                                <h6 class="mb-1 leading-normal text-sm text-gray-700">Total</h6>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                            <p id="labelTotal"
                                                class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-to-tl from-blue-500 to-violet-500 text-sm bg-clip-text">
                                                MX$0.00</p>
                                            <input name="total" id="total" type="hidden" value="0">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                                <button type="button" id="comprar"
                                    class="inline-block px-5 py-2.5 font-bold leading-normal text-center text-white align-middle transition-all  rounded-lg cursor-pointer text-sm ease-in shadow-md bg-150 bg-blue-500  hover:shadow-xs hover:-translate-y-px tracking-tight-rem bg-x-25">
                                    Realizar Comprar
                                </button>
                            </div>
                        </form>
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
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('categoria');
            const productosContainer = document.getElementById('productos');
            const clearAllButton = document.getElementById('clearAll');
            const shopProductos = document.getElementById('shopProductos');

            // Suponiendo un IVA de 16%
            const IVA_PERCENTAGE = 0.16;

            function updateTotals() {
                const products = document.querySelectorAll('#shopProductos li');
                let subtotal = 0;

                products.forEach(product => {
                    const quantityValue = product.querySelector('input[type="number"]').value;
                    const priceValue = product.getAttribute('data-venta');

                    // Asegurarse de que tanto quantity como price son números
                    const quantity = isNaN(quantityValue) ? 0 : parseFloat(quantityValue);
                    const price = isNaN(priceValue) ? 0 : parseFloat(priceValue);

                    subtotal += quantity * price;
                });

                const iva = subtotal * IVA_PERCENTAGE;
                const total = subtotal + iva;

                document.getElementById('subtotal').value = subtotal.toFixed(2);
                document.querySelector('label[for="subtotal"]').textContent = `MX$${subtotal.toFixed(2)}`;

                document.getElementById('iva').value = iva.toFixed(2);
                document.querySelector('label[for="iva"]').textContent = `MX$${iva.toFixed(2)}`;

                document.getElementById('total').value = total.toFixed(2);
                document.getElementById('labelTotal').textContent = `MX$${total.toFixed(2)}`;
                updateForm();
            }

            function updateForm() {
                // Elimina los campos existentes relacionados con productos
                const existingProductFields = formVenta.querySelectorAll(
                    '[name="producto_id[]"], [name="producto_cantidad[]"]');
                existingProductFields.forEach(field => field.remove());

                const products = document.querySelectorAll('#shopProductos li');
                products.forEach(product => {
                    const productId = product.getAttribute('data-id');
                    const quantity = product.querySelector('input[type="number"]').value;

                    // Crea campos ocultos para la ID del producto y su cantidad
                    const productIdField = document.createElement('input');
                    productIdField.type = 'hidden';
                    productIdField.name = 'producto_id[]';
                    productIdField.value = productId;

                    const productQuantityField = document.createElement('input');
                    productQuantityField.type = 'hidden';
                    productQuantityField.name = 'producto_cantidad[]';
                    productQuantityField.value = quantity;

                    // Añade los campos al formulario
                    formVenta.appendChild(productIdField);
                    formVenta.appendChild(productQuantityField);
                });
            }


            selectElement.addEventListener('change', function() {
                const selectedValue = this.value;
                const url = `/productos-por-categoria/${selectedValue}`;

                fetch(url)
                    .then(response => response.json())
                    .then(productos => {
                        let html = '';
                        console.log(productos);
                        productos.forEach(producto => {
                            html += `
                        <button type="button" class="w-full md:w-4/12 lg:w-3/12 lg:mb-0 mb-3 p-4 product-card" data-venta="${producto.precio_venta}" data-stock="${producto.stock}" data-id="${producto.id}" data-nombre="${producto.nombre}" data-imagen="${producto.imagen}">
                            <div class="p-4 shadow-2xl rounded-xl">
                                <img alt="${producto.nombre}" src="{{ asset('uploads') }}/${producto.imagen}"
                                    class="rounded-xl shadow-lg max-w-full h-auto align-middle border-none">
                                <div class="pt-3 text-center">
                                    <h5 class="text-gray-900 font-serif font-bold leading-normal mt-0 mb-0">
                                        ${producto.nombre}
                                    </h5>
                                    <p class="text-blue-gray-700 text-base font-light leading-relaxed mt-0 mb-2">
                                       Stock disponible: ${producto.stock}
                                    </p>
                                </div>
                            </div>
                        </button>
                    `;
                        });
                        productosContainer.innerHTML = html;

                        // Ahora que las tarjetas están generadas, añade el evento click a cada una de ellas.
                        document.querySelectorAll('.product-card').forEach(card => {
                            card.addEventListener('click', function() {
                                const productoId = this.getAttribute('data-id');
                                const productoNombre = this.getAttribute('data-nombre');
                                const productoPrecio = parseFloat(this.getAttribute(
                                    'data-venta'));
                                const productoImagen = this.getAttribute('data-imagen');
                                const productoStock = parseInt(this.getAttribute(
                                    'data-stock'), 10);

                                const existingProduct = document.querySelector(
                                    `#shopProductos [data-id="${productoId}"]`);

                                if (existingProduct) {
                                    // Si el producto ya existe en la lista, incrementamos la cantidad
                                    const quantityInput = existingProduct.querySelector(
                                        'input[type="number"]');
                                    const newQuantity = parseInt(quantityInput.value,
                                        10) + 1;

                                    // No permitir que la cantidad exceda el stock
                                    if (newQuantity <= productoStock) {
                                        quantityInput.value = newQuantity;
                                    }
                                } else {
                                    // Si no, añadimos un nuevo elemento a la lista
                                    const html = `
                                            <li class="mb-4 flex flex-row items-center" data-id="${productoId}" data-venta="${productoPrecio}">
                                                <img src="{{ asset('uploads') }}/${productoImagen}" alt="${productoNombre}" width="50" class="mr-4">
                                                <span class="flex-grow">${productoNombre}</span>
                                                <input readonly type="number" min="1" max="${productoStock}" value="1"class="w-16 mr-4">
                                                <button type="button" style="background:red;" class="bg-red-500 text-white px-2 py-1 rounded delete-product"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg></button>
                                            </li>`;

                                    const shopProductos = document.getElementById(
                                        'shopProductos');
                                    shopProductos.insertAdjacentHTML('beforeend', html);
                                }
                                // Añadir escuchador de eventos para actualizar totales cuando se cambia la cantidad
                                shopProductos.querySelector(
                                    `[data-id="${productoId}"] input[type="number"]`
                                ).addEventListener('change', updateTotals);

                                // Actualizar totales
                                updateTotals();

                                // Función para eliminar inputs relacionados con un producto específico
                                function removeProductInputs(productId) {
                                    const productIdFields = formVenta.querySelectorAll(
                                        `[name="producto_id[]"][value="${productId}"]`
                                    );
                                    const productQuantityFields = formVenta
                                        .querySelectorAll(
                                            `[data-product-id="${productId}"]`);

                                    productIdFields.forEach(field => field.remove());
                                    productQuantityFields.forEach(field => field
                                        .remove());
                                }

                                // Agregamos el escuchador de eventos al botón de eliminar
                                document.querySelectorAll('.delete-product').forEach(
                                    btn => {
                                        btn.addEventListener('click', function() {
                                            // Encuentra el elemento <li> más cercano y lo elimina
                                            this.closest('li').remove();
                                            removeProductInputs(
                                                productId
                                            ); // Elimina los inputs del producto en el formulario
                                            updateTotals();
                                        });
                                    });
                            });
                        });

                    })
                    .catch(error => {
                        console.error("Hubo un error al cargar los productos:", error);
                    });
            });
            clearAllButton.addEventListener('click', function() {
                shopProductos.innerHTML = '';
                // Elimina todos los inputs de productos del formulario
                const allProductInputs = formVenta.querySelectorAll(
                    '[name="producto_id[]"], [name="producto_cantidad[]"]');
                allProductInputs.forEach(input => input.remove());
                updateTotals();
            });
            const comprarButton = document.getElementById('comprar');

            comprarButton.addEventListener('click', function(event) {
                event.preventDefault(); // Evita que el formulario se envíe inmediatamente

                const totalVenta = parseFloat(document.getElementById('total').value);

                Swal.fire({
                    title: 'Realizar Compra',
                    html: `
                <p>Total de la venta: MX$${totalVenta.toFixed(2)}</p>
                <input id="cantidadPaga" type="number" class="swal2-input" placeholder="Cantidad que paga el cliente">
            `,
                    focusConfirm: false,
                    preConfirm: () => {
                        return document.getElementById('cantidadPaga').value;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const cantidadPaga = parseFloat(result.value);
                        const cambio = cantidadPaga - totalVenta;

                        if (cambio < 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Cantidad insuficiente',
                                text: 'La cantidad proporcionada es menor que el total de la venta.'
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Venta realizada con éxito',
                                text: `El cambio para el cliente es: MX$${cambio.toFixed(2)}`
                            }).then(() => {
                                // Aquí puedes enviar el formulario si todo es correcto
                                document.getElementById('formVenta').submit();
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
