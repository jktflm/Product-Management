<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed categories
        $categories = [
            [
                'category_name' => 'Skin Care',
                'description' => 'Category for skin care products',
            ],
            [
                'category_name' => 'Hair Care',
                'description' => 'Category for hair care products',
            ],
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Seed products
        $products = [
            [
                'product_name' => 'Likas Papaya',
                'product_sku' => 'XYZ12345',
                'product_category_id' => 1, // Assuming the category ID is 1 for Skin Care
                'product_description' => 'Original Likas Papaya Soap for pimples and acne dark underarms new whitening body soap deodorant glow beauty good for face herbal soap super effective',
            ],
            [
                'product_name' => 'Glow Skin (RIVO - RVL) Snail Gold Whipp Soap',
                'product_sku' => 'XYZ67890',
                'product_category_id' => 1, // Assuming the category ID is 1 for Skin Care
                'product_description' => 'Papaya soap is a natural, gentle soap that\'s safe to use on different parts of the body, including the face. A normal bar of soap also cleans and removes dirt. But it may be too harsh for the skin, stripping it of natural oils',
            ],
            // Add more products as needed
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
