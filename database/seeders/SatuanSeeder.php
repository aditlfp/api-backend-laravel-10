<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['pcs'];
        foreach($arr as $data => $value){
            $role = new Satuan();
            $role->name = $value;
            $role->save();
        }
    }
}
