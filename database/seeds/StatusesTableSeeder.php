<?php

use App\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $statuses = Config::get('constants.db.order_statuses');
            foreach ($statuses as $key => $status) {
                Status::create(['name' => $status]);

            }

        }
    }
}
