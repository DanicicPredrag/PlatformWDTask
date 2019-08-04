<?php

use App\Activities;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            $activity_title = 'activity_title_' . $i;
            DB::table(Activities::TABLE_NAME)->insert([
                'title' => $activity_title,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
