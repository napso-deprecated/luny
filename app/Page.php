<?php

namespace App;


use Napso\Lunytags\TaggableTrait;

class Page extends Model
{

    use TaggableTrait;

    public static function getArchives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body, $userId)
    {

        /*Comment::create([
            'body' => $body,
            'page_id' => $this->id,
        ]);*/
        $user_id = $userId;
        $this->comments()->create(compact('body', 'user_id'));
        // redirect ?
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // scopes

    public function scopeIsPublished($query)
    {
        return $query->where('published', true);
    }

    public function getRouteKeyName()
    {
        return 'uri';
    }


}
