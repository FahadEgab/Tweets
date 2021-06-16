<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $table ='hashtags';
    protected $primaryKey = 'id';
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'.'pivot'];

    public function tweets(){
        return $this->belongsToMany('App\Models\Tweet','tweet_hashtag','hashtag_id','tweet_id','id', 'Id');
    }
}
