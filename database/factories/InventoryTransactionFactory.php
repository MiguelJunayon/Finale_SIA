<?php

namespace Database\Factories;

use App\Models\InventoryTransaction;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryTransactionFactory extends Factory
{
    protected $model = InventoryTransaction::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'supplier_id' => Supplier::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            
        ];
    }
}

