@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="mb-6">
            <a href="{{ route('categorias.index') }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver a Categorías
            </a>
        </div>

        <h1 class="text-center text-gray-800 text-2xl font-medium mb-6">Productos de {{ $subcategoria->nombre }}</h1>

        <div class="flex flex-wrap justify-evenly gap-6">
            @foreach($productos as $producto)
                <a href="{{ route('producto.show', $producto->id_producto) }}" class="block">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-[280px] transition duration-300 transform hover:scale-105">
                        <img class="h-[180px] w-full object-cover" src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}">
                        <div class="p-4">
                            <h2 class="font-bold text-lg text-gray-800 mb-2">{{ $producto->nombre }}</h2>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($producto->descripcion, 60) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold text-blue-600">${{ number_format($producto->precio_dolares, 2) }}</span>
                                <span class="text-sm text-gray-500">Stock: {{ $producto->stock }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
