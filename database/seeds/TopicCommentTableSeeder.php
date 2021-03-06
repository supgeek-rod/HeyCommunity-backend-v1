<?php

use Illuminate\Database\Seeder;

class TopicCommentTableSeeder extends Seeder
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
        $topics = \App\Topic::lists('id')->toArray();

        $faker = Faker\Factory::create();
        foreach (range(1, 868) as $index) {
            $topicId = $faker->randomElement($topics);

            $data[] = [
                'user_id'       =>      $faker->randomElement($users),
                'topic_id'      =>      $topicId,
                'content'       =>      implode('', $faker->paragraphs(random_int(1, 2))),

                'created_at'    =>  $faker->dateTimeThisMonth(),
                'updated_at'    =>  $faker->dateTimeThisMonth(),
            ];
        }
        \App\TopicComment::insert($data);
    }
}
