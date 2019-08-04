<?php

use App\Activities;
use App\TimeSpent;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TimeSpentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $activities = DB::select("SELECT * FROM `" . Activities::TABLE_NAME . "`");
        foreach ($activities as $activity) {
            $timpe_spent_records = rand(1 , 4);
            for ($i = 0; $i < $timpe_spent_records; $i++) {
                DB::table(TimeSpent::TABLE_NAME)->insert([
                    'activity_id' => $activity->activity_id,
                    'description' => $faker->domainWord,
                    'time_spent' => rand(1,180),
                    'created_at' => Carbon::now(),
                ]);
            }
        }
    }
}
