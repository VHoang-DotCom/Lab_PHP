<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        admin::create([
            'username' => 'Viet Hoang',
            'password' => 'hello123',
            'fullName' => 'NVH',
            'company' => 'FPT',
            'job' => 'Designer',
            'country' => 'Viet Nam',
            'address' => 'Hai Duong',
            'phone' => '232132432342',
            'email' => 'hello@.com',
            'about' => '',
            'image' => 'me.jpg',
            'twitter' => 'hello123',
            'facebook' => 'hello123',
            'instagram' => 'hello123',
            'linkedin' => 'hello123',
        ]);
    }
}
