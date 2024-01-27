<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('cashiers')->insert([
            'nama' => 'Nyoman Wisatria',
            'namajus' => 'anggur',
            'harga'=>'5000',
        ]);
    }
}
