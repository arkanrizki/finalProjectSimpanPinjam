<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'nama' => 'Admin'],
            ['id' => 2, 'nama' => 'Koperasi']
        ];
        DB::table('roles')->insert($data);
    }
}
