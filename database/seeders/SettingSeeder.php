<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'website_name'=> 'my Blog',
            'website_description'=> 'My Blog concern of new Technology',
            'website_logo'=> 'NULL',
            'posts_quantity'=> '10',
            'most_views_quantity'=> '10',
            'related_posts_quantity'=> '10'
        ]);
    }
}
