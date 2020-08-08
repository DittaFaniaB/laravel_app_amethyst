<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //initialisation (actually we dont have to do this cz its already by default)
    //1. Table Name - if we want to change the name of the table.
    //by default, its the same with model's name. but we can change it by adding
    protected $table = 'posts';
    public $primary_key = 'id'; //we can change them to, for example 'form_id'
    public $timestamps = true; // default is true

    public function user()
    {
        return $this->belongsTo('App\User');
        //is that a post has a relationship to user.
        //that single post belongs to a user
        
    }
}
