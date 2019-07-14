<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        'created_on' => 'datetime',

    ];


    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    public $timestamps = false;
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
