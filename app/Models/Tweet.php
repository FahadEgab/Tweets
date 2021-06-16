<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id';
    protected $fillable =['Id','content','user_id','created_at','updated_id'];
    protected $hidden = ['pivot'];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function hashtags(){
        return $this->belongsToMany('App\Models\Hashtag','tweet_hashtag','tweet_id','hashtag_id','Id', 'id');
    }
}
