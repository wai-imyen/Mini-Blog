<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

	protected $table = 'videos';

    protected $primayKey = 'id';

    protected $fillable = ['title' , 'content' , 'path', 'category','web_path','others'];


    // public function VideoCategory(){

    // 	 return $this->belongsTo('App\VideoCategory', 'foreign_key', 'category');
    	 
    // }
}
