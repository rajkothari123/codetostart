<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable=['name','photo'];
    
    public function blog(){
    	return $this->belongsTo(Blog::class);
    }

    public function user(){
    	return $this->belongsTo(Photo::class);
    }
}
