<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $table = 'authenticated_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'date_of_birth',
        'avatar', 'description',
    ];


    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow', 'followed_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'follow', 'follower_id', 'followed_id');
    }


    public function suspensions()
    {
        return $this->hasMany(Suspension::class, 'user_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'reported_id');
    }

    public function givenReports()
    {
        return $this->hasMany(Report::class, 'reporter_id');
    }

    public function proposedTopics()
    {
        return $this->hasMany(Tag::class, 'user_id');
    }


    public function favoriteTopics()
    {
        return $this->belongsToMany(Tag::class, 'favorite_topic', 'user_id');
    }

    public function content()
    {
        return $this->hasMany(Content::class, 'author_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'receiver_id');
    }


    public function articles()
    {
        return Article::where('author_id', $this->id)->get();
    }

    public function comments()
    {
        return Comment::where('author_id', $this->id)->get();
    }

    public function isFollowing($userId)
    {
        $followList = $this->following->where('id', $userId);
        return count($followList) > 0;
    }

    // Gets the info on the suspension with the farthest end_time
    public function suspensionEndInfo()
    {
        $suspension = $this->suspensions->sortByDesc('end_time')->first();
        if (!isset($suspension)) return null;

        return [
            'reason' => $suspension->reason,
            'end_date' => gmdate('d-m-Y', strtotime($suspension->end_time)),
        ];
    }
}