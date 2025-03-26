<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Vite;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $categorias = [
            [
                'nombre' => 'Electrónicos',
                'imagen_url' => Vite::asset('resources/img/CategoriaElectronicos.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'nombre' => 'Moda',
                'imagen_url' => Vite::asset('resources/img/CategoriaModa.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'nombre' => 'Hogar',
                'imagen_url' => Vite::asset('resources/img/CategoriaHogar.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert($categoria);
        }

        $subcategorias = [
            [
                'id_categoria' => 1,
                'nombre' => 'Smartphones',
                'imagen_url' => Vite::asset('resources/img/smartphones.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_categoria' => 1,
                'nombre' => 'Laptops',
                'imagen_url' => Vite::asset('resources/img/laptops.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_categoria' => 2,
                'nombre' => 'Camisetas',
                'imagen_url' => Vite::asset('resources/img/camisetas.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_categoria' => 3,
                'nombre' => 'Muebles',
                'imagen_url' => Vite::asset('resources/img/muebles.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
        ];

        foreach ($subcategorias as $subcategoria) {
            DB::table('subcategorias')->insert($subcategoria);
        }

        $marcas = [
            [
                'nombre' => 'Samsung',
                'codigo_pais' => 'KR',
                'logo_url' => Vite::asset('resources/img/samsung.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'nombre' => 'Apple',
                'codigo_pais' => 'US',
                'logo_url' => Vite::asset('resources/img/apple.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'nombre' => 'Nike',
                'codigo_pais' => 'US',
                'logo_url' => Vite::asset('resources/img/nike.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
        ];

        foreach ($marcas as $marca) {
            DB::table('marcas')->insert($marca);
        }

        $proveedores = [
            [
                'nombre_comercial' => 'ElectroImport S.A.',
                'tipo_documento' => 'R',
                'numero_documento' => '20123456789',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'nombre_comercial' => 'ModaTotal E.I.R.L.',
                'tipo_documento' => 'R',
                'numero_documento' => '20987654321',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'nombre_comercial' => 'HomeCentro',
                'tipo_documento' => 'R',
                'numero_documento' => '20567890123',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
        ];

        foreach ($proveedores as $proveedor) {
            DB::table('proveedores')->insert($proveedor);
        }

        $productos = [
            [
                'id_subcategoria' => 1,
                'id_marca' => 1,
                'id_proveedor' => 1,
                'codigo' => 'SM-G975F',
                'nombre' => 'Samsung Galaxy S10+',
                'descripcion' => 'Smartphone de gama alta con pantalla AMOLED',
                'especificaciones' => 'Procesador Exynos 9820, 8GB RAM, 128GB Almacenamiento',
                'precio_dolares' => 699.99,
                'stock' => 50,
                'imagen_url' => Vite::asset('resources/img/samsunggalaxy.png'),
                'informacion_fabricante_url' => 'https://www.samsung.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_subcategoria' => 1,
                'id_marca' => 2,
                'id_proveedor' => 1,
                'codigo' => 'IP-13P',
                'nombre' => 'iPhone 13 Pro',
                'descripcion' => 'Smartphone premium con sistema iOS',
                'especificaciones' => 'Chip A15 Bionic, 6GB RAM, 256GB Almacenamiento',
                'precio_dolares' => 999.99,
                'stock' => 30,
                'imagen_url' => Vite::asset('resources/img/iphone13.png'),
                'informacion_fabricante_url' => 'https://www.apple.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_subcategoria' => 3,
                'id_marca' => 3,
                'id_proveedor' => 2,
                'codigo' => 'NK-TS21',
                'nombre' => 'Camiseta Nike Sportswear',
                'descripcion' => 'Camiseta deportiva de algodón',
                'especificaciones' => '100% algodón, talla M, L, XL',
                'precio_dolares' => 29.99,
                'stock' => 100,
                'imagen_url' => Vite::asset('resources/img/camisetanike.png'),
                'informacion_fabricante_url' => 'https://www.nike.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_subcategoria' => 4,
                'id_marca' => 1,
                'id_proveedor' => 3,
                'codigo' => 'MU-SOF1',
                'nombre' => 'Sofá Modular Comfort',
                'descripcion' => 'Sofá modular para sala de estar',
                'especificaciones' => '3 cuerpos, tapizado en eco-cuero, color gris',
                'precio_dolares' => 499.99,
                'stock' => 15,
                'imagen_url' => Vite::asset('resources/img/sofamodular.png'),
                'informacion_fabricante_url' => 'https://www.sofamodular.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],

            [
                'id_subcategoria' => 2,
                'id_marca' => 1,
                'id_proveedor' => 1,
                'codigo' => 'SAM-NP950',
                'nombre' => 'Samsung Galaxy Book Pro',
                'descripcion' => 'Laptop ultradelgada con pantalla AMOLED',
                'especificaciones' => 'Intel Core i7, 16GB RAM, 512GB SSD, Windows 11',
                'precio_dolares' => 1299.99,
                'stock' => 25,
                'imagen_url' => Vite::asset('resources/img/samsunglaptop.png'),
                'informacion_fabricante_url' => 'https://www.samsung.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_subcategoria' => 2,
                'id_marca' => 2,
                'id_proveedor' => 1,
                'codigo' => 'APP-MBP14',
                'nombre' => 'MacBook Pro 14"',
                'descripcion' => 'Laptop profesional con chip M1 Pro',
                'especificaciones' => 'Apple M1 Pro, 16GB RAM, 512GB SSD, macOS',
                'precio_dolares' => 1999.99,
                'stock' => 20,
                'imagen_url' => Vite::asset('resources/img/macbookpro.png'),
                'informacion_fabricante_url' => 'https://www.apple.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_subcategoria' => 2,
                'id_marca' => 1,
                'id_proveedor' => 1,
                'codigo' => 'SAM-NP750',
                'nombre' => 'Samsung Galaxy Book',
                'descripcion' => 'Laptop versátil para uso diario',
                'especificaciones' => 'Intel Core i5, 8GB RAM, 256GB SSD, Windows 11',
                'precio_dolares' => 899.99,
                'stock' => 30,
                'imagen_url' => Vite::asset('resources/img/galaxybook.png'),
                'informacion_fabricante_url' => 'https://www.samsung.com',
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert($producto);
        }

        $producto_imagenes = [
            [
                'id_producto' => 1,
                'imagen_url' => Vite::asset('resources/img/1.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 1,
                'imagen_url' => Vite::asset('resources/img/2.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 1,
                'imagen_url' => Vite::asset('resources/img/3.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 2,
                'imagen_url' => Vite::asset('resources/img/4.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 2,
                'imagen_url' => Vite::asset('resources/img/5.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 3,
                'imagen_url' => Vite::asset('resources/img/6.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 3,
                'imagen_url' => Vite::asset('resources/img/7.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 4,
                'imagen_url' => Vite::asset('resources/img/8.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 4,
                'imagen_url' => Vite::asset('resources/img/9.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 5,
                'imagen_url' => Vite::asset('resources/img/10.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 5,
                'imagen_url' => Vite::asset('resources/img/11.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 6,
                'imagen_url' => Vite::asset('resources/img/12.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 6,
                'imagen_url' => Vite::asset('resources/img/13.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 7,
                'imagen_url' => Vite::asset('resources/img/14.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],
            [
                'id_producto' => 7,
                'imagen_url' => Vite::asset('resources/img/15.png'),
                'estado_auditoria' => 'A',
                'fecha_creacion_auditoria' => now(),
            ],

        ];

        foreach ($producto_imagenes as $imagen) {
            DB::table('producto_imagenes')->insert($imagen);
        }
    }
}
