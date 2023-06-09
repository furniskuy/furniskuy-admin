<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier;
        $supplier->nama_supplier = 'PT. Jaya Abadi';
        $supplier->alamat = 'Jl. Raya Cikarang';
        $supplier->save();
    }
}
