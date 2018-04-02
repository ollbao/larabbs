<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;

class topicObserver
{
    
    public function saving(Topic $topic)
    {
        //XSS过滤
        $topic->body = clean($topic->body, 'user_topic_body');
        //话题摘录
        $topic->excerpt = make_excerpt($topic->body);
        
    }

    public function saved(Topic $topic)
    {
        //SEO 友好的 URL(加入队列)
        dispatch(new TranslateSlug($topic));
    }
}