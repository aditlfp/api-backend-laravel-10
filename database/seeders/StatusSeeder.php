<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['Pending', 'Approve', 'Cancelled'];
        foreach($arr as $data => $value){
            $role = new Status();
            $role->name = $value;
            $role->save();
        }
    }
}
