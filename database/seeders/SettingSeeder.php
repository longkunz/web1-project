<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'description' => "Longkunz Furniture's products are always focused and designed in their own style to create a comfortable living space for customers.",
            'title' => "Longkunz furniture store",
            'logo' => "/img/logo.png",
            'address' => "53 Vo Van Ngan",
            'phone' => "0123456789",
            'email' => "store@mail.com",
        ]);
    }
}
