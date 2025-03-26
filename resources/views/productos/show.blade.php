@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <a href="{{ route('productos.index', $producto->id_subcategoria) }}" class="text-blue-500 hover:text-blue-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver a Productos
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2 relative" x-data="{ activeSlide: 0, slides: {{ count($imagenes) > 0 ? count($imagenes) : 1 }} }">
                <div class="relative h-96">
                    <!-- Imagen principal si no hay imágenes en el carrusel -->
                    @if(count($imagenes) == 0)
                        <div class="absolute inset-0">
                            <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-full object-contain">
                        </div>
                    @else
                        @foreach($imagenes as $index => $imagen)
                            <div class="absolute inset-0 transition-opacity duration-500"
                                x-show="activeSlide === {{ $index }}"
                                x-transition:enter="transition ease-in-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in-out duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0">
                                <img src="{{ $imagen->imagen_url }}" alt="{{ $producto->nombre }}" class="w-full h-full object-contain">
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- Miniaturas de imágenes -->
                @if(count($imagenes) > 1)
                    <div class="flex justify-center mt-4 space-x-2 px-4">
                        @foreach($imagenes as $index => $imagen)
                            <button @click="activeSlide = {{ $index }}"
                                    class="h-16 w-16 rounded overflow-hidden focus:outline-none border-2 transition-all"
                                    :class="activeSlide === {{ $index }} ? 'border-blue-600' : 'border-transparent'">
                                <img src="{{ $imagen->imagen_url }}" alt="Miniatura {{ $index + 1 }}" class="h-full w-full object-cover">
                            </button>
                        @endforeach
                    </div>

                    <!-- Controles de navegación -->
                    <div class="absolute inset-x-0 bottom-4 flex justify-center">
                        <div class="flex space-x-2">
                            @foreach($imagenes as $index => $imagen)
                                <button @click="activeSlide = {{ $index }}"
                                        class="w-3 h-3 rounded-full mx-1 focus:outline-none transition-all"
                                        :class="activeSlide === {{ $index }} ? 'bg-blue-600' : 'bg-gray-300'">
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Botones de flecha -->
                    <button @click="activeSlide = (activeSlide - 1 + slides) % slides"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-2 rounded-full transition-all focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="activeSlide = (activeSlide + 1) % slides"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-2 rounded-full transition-all focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @endif
            </div>

            <div class="md:w-1/2 p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $producto->nombre }}</h1>

                <div class="flex items-center mb-4">
                    <span class="text-gray-600 mr-2">Marca:</span>
                    <span class="font-semibold">{{ $marca->nombre }}</span>
                    @if($marca->logo_url)
                        <img src="{{ $marca->logo_url }}" alt="{{ $marca->nombre }}" class="h-6 ml-2">
                    @endif
                </div>

                <div class="mb-4">
                    <span class="text-gray-600">Proveedor:</span>
                    <span class="font-semibold ml-2">{{ $proveedor->nombre_comercial }}</span>
                </div>

                <div class="text-2xl font-bold text-blue-600 mb-4">
                    ${{ number_format($producto->precio_dolares, 2) }}
                </div>

                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <h2 class="text-lg font-semibold mb-2">Descripción</h2>
                    <p class="text-gray-700">{{ $producto->descripcion }}</p>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-2">Especificaciones</h2>
                    <p class="text-gray-700">{{ $producto->especificaciones }}</p>
                </div>

                <div class="flex items-center mb-6">
                    <span class="text-gray-600 mr-2">Disponibles:</span>
                    <span class="font-semibold {{ $producto->stock < 10 ? 'text-red-600' : '' }}">
                        {{ $producto->stock }} unidades
                    </span>
                </div>

                <div class="flex space-x-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center transition duration-300 {{ $producto->stock == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                            {{ $producto->stock == 0 ? 'disabled' : '' }}>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Agregar al carrito
                    </button>
                </div>

                @if($producto->informacion_fabricante_url)
                    <div class="mt-6">
                        <a href="{{ $producto->informacion_fabricante_url }}" target="_blank" class="text-blue-500 hover:underline flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            Información del fabricante
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
