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

    <h1 class="text-center text-gray-800 text-2xl font-medium mb-6">Subcategorías de {{ $categoria->nombre }}</h1>

    <div class="flex flex-wrap justify-evenly gap-4">
        @foreach($subcategorias as $subcategoria)
            <a href="{{ route('productos.index', $subcategoria->id_subcategoria) }}" class="block">
                <div class="bg-gray-200 hover:bg-gray-300 w-[300px] h-[200px] p-4 rounded cursor-pointer transition duration-300 transform hover:scale-105">
                    <img class="h-[130px] w-full object-cover rounded" src="{{ $subcategoria->imagen_url }}" alt="{{ $subcategoria->nombre }}">
                    <p class="text-center mt-3 font-medium text-gray-800">{{ $subcategoria->nombre }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
