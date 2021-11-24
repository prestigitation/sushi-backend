<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Consist;

class ConsistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Consist::CONSIST_LIST as $name => $id) {
            Consist::create([
                'id' => $id,
                'name' => $name,
                'image_path' => env('APP_PATH').'/images/consists/banzai.svg',
            ]);
        }
    }
}
