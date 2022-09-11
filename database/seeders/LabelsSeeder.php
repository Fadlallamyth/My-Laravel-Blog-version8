<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Label::create([
            'label'=> 'تصنيف 1',
            'quantity'=> '6',
        ]);
        Label::create([
            'label'=> 'تصنيف 2',
            'quantity'=> '6',
        ]);
        Label::create([
            'label'=> 'تصنيف 3',
            'quantity'=> '6',
        ]);
        Label::create([
            'label'=> 'تصنيف 4',
            'quantity'=> '6',
        ]);
        Label::create([
            'label'=> 'تصنيف 5',
            'quantity'=> '6',
        ]);
    }
}
