<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'user_id' => 5,
            'banner' => 'Uploads/123.png',
            'shop_name' =>  'Vendor Shop',
            'email' => 'vendor1@gmail.com',
            'phone' => '+213770841846',
            'address' => 'Usa' ,
            'description' => 'aaaaaaaaaaaaa',
            'fb_link' => 'www.facebook.com/vandor1',
            'insta_link' => 'www.instagram.com/vandor1',
            'tw_link' => 'www.twiter.com/vandor1',
            
            ]);
    }
}
