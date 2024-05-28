<?php

namespace Database\Seeders;
use App\Models\InventoryTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoryTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InventoryTransaction::factory(10)->create();//
    }
}
