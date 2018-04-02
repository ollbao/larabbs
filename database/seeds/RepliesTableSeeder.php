<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Reply;
use App\Models\Topic;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //获取用户数据
        $userIds = User::pluck('id');
        //话题数据
        $topicIds= Topic::pluck('id');

        $replies = factory(Reply::class, 1000)->make()->each(function($reply) use($userIds, $topicIds){
            $reply->user_id = $userIds->random();
            $reply->topic_id = $topicIds->random();
        });

        Reply::insert($replies->toArray());
    }
}
