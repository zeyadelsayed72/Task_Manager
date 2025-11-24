<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Categoryseeder extends Seeder
{
    public function run(): void
    {
        $categories= [
            'Work',
            'Personal',
            'Project',
            'Education',
            'Finance',
            'Health',
            'Fitness',
        ];
        foreach($categories as $category)
        category::create(['name'=>$category]);

    }
}
