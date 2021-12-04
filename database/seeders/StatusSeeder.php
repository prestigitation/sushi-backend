<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Status::STATUS_LIST as $key => $status) {
            Status::create([
                'name' => $key,
                'id' => $status
            ]);
        }
    }
}
