<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
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
        //获取话题分类
        $categoryIds = Category::pluck('id');
        $topics = factory(Topic::class, 100)->make()->each(function($topic) use($userIds, $categoryIds){
            $topic->user_id = $userIds->random();
            $topic->category_id = $categoryIds->random();
        });

        Topic::insert($topics->toArray());
    }
}
