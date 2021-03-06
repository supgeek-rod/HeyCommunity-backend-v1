<?php

use Illuminate\Database\Seeder;

class TimelineCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = \App\User::lists('id')->toArray();
        $timelines = \App\Timeline::lists('id')->toArray();

        $faker = Faker\Factory::create();
        foreach (range(1, 868) as $index) {
            $timelineId = $faker->randomElement($timelines);

            $data[] = [
                'user_id'       =>      $faker->randomElement($users),
                'timeline_id'   =>      $timelineId,
                'content'       =>      implode('', $faker->paragraphs(random_int(1, 2))),

                'created_at'    =>  $faker->dateTimeThisMonth(),
                'updated_at'    =>  $faker->dateTimeThisMonth(),
            ];
        }
        \App\TimelineComment::insert($data);
    }
}
