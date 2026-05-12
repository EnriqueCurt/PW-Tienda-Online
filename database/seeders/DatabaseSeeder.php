<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::factory()->admin()->create([
            'name' => 'Administrador',
            'email' => 'admin@tienda.com',
        ]);

        // Customer users
        User::factory(5)->create();

        // Categories
        $categories = [
            ['name' => 'Calzado', 'slug' => 'calzado', 'description' => 'Zapatos, zapatillas y botas de las mejores marcas.'],
            ['name' => 'Ropa', 'slug' => 'ropa', 'description' => 'Camisetas, pantalones, chaquetas y más.'],
            ['name' => 'Accesorios', 'slug' => 'accesorios', 'description' => 'Relojes, gafas, cinturones y complementos.'],
            ['name' => 'Electrónica', 'slug' => 'electronica', 'description' => 'Gadgets, auriculares y dispositivos smart.'],
            ['name' => 'Hogar', 'slug' => 'hogar', 'description' => 'Decoración, mobiliario y artículos para el hogar.'],
        ];

        foreach ($categories as $index => $catData) {
            $catData['image_url'] = 'https://picsum.photos/seed/cat' . $index . '/800/600';
            Category::create($catData);
        }

        // Products - 4 per category
        $products = [
            // Calzado
            ['name' => 'Zapatillas Urban Pro', 'price' => 89.99, 'stock' => 25, 'category_id' => 1],
            ['name' => 'Botas Mountain X', 'price' => 149.99, 'stock' => 15, 'category_id' => 1],
            ['name' => 'Sneakers Classic Air', 'price' => 119.99, 'stock' => 30, 'category_id' => 1],
            ['name' => 'Sandalias Comfort Plus', 'price' => 49.99, 'stock' => 40, 'category_id' => 1],
            // Ropa
            ['name' => 'Camiseta Premium Fit', 'price' => 34.99, 'stock' => 50, 'category_id' => 2],
            ['name' => 'Chaqueta Windbreaker', 'price' => 79.99, 'stock' => 20, 'category_id' => 2],
            ['name' => 'Pantalón Cargo Slim', 'price' => 59.99, 'stock' => 35, 'category_id' => 2],
            ['name' => 'Sudadera Oversize', 'price' => 44.99, 'stock' => 45, 'category_id' => 2],
            // Accesorios
            ['name' => 'Reloj Digital Sport', 'price' => 199.99, 'stock' => 10, 'category_id' => 3],
            ['name' => 'Gafas de Sol Polarized', 'price' => 69.99, 'stock' => 30, 'category_id' => 3],
            ['name' => 'Cinturón Cuero Premium', 'price' => 39.99, 'stock' => 25, 'category_id' => 3],
            ['name' => 'Mochila Travel Pro', 'price' => 89.99, 'stock' => 20, 'category_id' => 3],
            // Electrónica
            ['name' => 'Auriculares Wireless Pro', 'price' => 129.99, 'stock' => 18, 'category_id' => 4],
            ['name' => 'Smartwatch Fitness', 'price' => 249.99, 'stock' => 12, 'category_id' => 4],
            ['name' => 'Altavoz Bluetooth Mini', 'price' => 59.99, 'stock' => 40, 'category_id' => 4],
            ['name' => 'Cargador Solar Portátil', 'price' => 34.99, 'stock' => 50, 'category_id' => 4],
            // Hogar
            ['name' => 'Lámpara LED Moderna', 'price' => 79.99, 'stock' => 22, 'category_id' => 5],
            ['name' => 'Cojín Decorativo Set', 'price' => 29.99, 'stock' => 60, 'category_id' => 5],
            ['name' => 'Vela Aromática Premium', 'price' => 19.99, 'stock' => 80, 'category_id' => 5],
            ['name' => 'Espejo Pared Minimalista', 'price' => 149.99, 'stock' => 8, 'category_id' => 5],
        ];

        foreach ($products as $index => $prodData) {
            Product::create([
                'name' => $prodData['name'],
                'slug' => Str::slug($prodData['name']),
                'description' => fake()->paragraph(3),
                'price' => $prodData['price'],
                'stock' => $prodData['stock'],
                'image_url' => 'https://picsum.photos/seed/prod' . $index . '/600/600',
                'category_id' => $prodData['category_id'],
                'is_active' => true,
            ]);
        }
    }
}
