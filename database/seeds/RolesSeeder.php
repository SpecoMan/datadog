<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            'user',
            'admin'

        ];

        foreach ($list as $value)
            \App\Models\Roles::create(['name' => $value]);
    }
}
