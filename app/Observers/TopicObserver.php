<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

class topicObserver
{
    
    public function saving(Topic $topic)
    {
        //XSS过滤
        $topic->body = clean($topic->body, 'user_topic_body');
        //话题摘录
        $topic->excerpt = make_excerpt($topic->body);
        //SEO 友好的 URL
        $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
    }
}