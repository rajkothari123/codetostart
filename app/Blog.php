<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
    protected $fillable=['title','body','photo_id','slug','meta_title','meta_desc','status','user_id'];





    public function category(){
    	return $this->belongsToMany(Category::class);
    }



    public function photo(){
    	return $this->belongsTo(Photo::class);
    }


    public function user(){
    return $this->belongsTo(User::class);	
    }
}
