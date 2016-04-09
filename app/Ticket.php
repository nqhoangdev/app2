<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // Rename your table here:
    
    // protected $table = 'custom name';
    
    protected $fillable = ['title', 'content', 'slug', 'status', 'user_id'];
    
    public function user(){
        $this->belongsTo('App\User');
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function comments() {
        return $this->hasMany('App\Comment', 'ticket_id');
        
    }
}
