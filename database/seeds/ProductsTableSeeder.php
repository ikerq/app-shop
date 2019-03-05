<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear factories simples
        // factory(Category::class, 5)->create();
        // factory(Product::class, 100)->create();
        // factory(ProductImage::class, 200)->create();

        //Crear factories de forma relacional
        $categories = factory(Category::class, 5)->create();//crea las categorias y las persiste en BD
        $categories->each(function($category){//iteramos en la categoria
            $products = factory(Product::class, 20)->make();//Crea 20 productos pero no los persiste
            $category->products()->saveMany($products);//asigna a cada uno de los 20 productos la categoria actual del each y los guarda en BD  

            $products->each(function($p){// iteramos en los productos
                $images = factory(ProductImage::class, 5)->make();//Crea 5 imagenes pero no las persiste 
                $p->images()->saveMany($images);//Asigna a cada una de las 5 imagenes el producto actual del each y los guarda en BD
            });
        });

    }
}
