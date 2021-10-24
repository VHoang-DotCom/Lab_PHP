<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Stock;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'product_name' => 'Note 10',
            'product_desc' => 'The product of Samsung',
            'product_qty' => 200,
            'product_image' => 'picture.jpg'
        ]);
    }
}
