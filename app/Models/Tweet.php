<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id';
    protected $fillable =['Id','content','user_id','created_at','updated_id'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
