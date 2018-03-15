<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 获取最新或最新回复的话题
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string $order
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithOrder($query, $order)
    {
        switch ($order) {
            case 'recent':
                $query = $this->scopeRecent($query);
                break;
            
            default:
                $query = $this->scopeRecentReplied($query);
                break;
        }
        return $query;
    }

    /**
     * 最新回复的话题
     *
     * @param  \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecentReplied($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * 最新话题
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function test(){
        echo 'aaa';exit;
    }

}
