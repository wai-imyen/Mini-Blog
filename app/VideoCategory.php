<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{

    protected $table = 'video_categories';

    protected $primaryKey = 'id';

    protected $fillable = ['name' , 'pic','content'];

    
    // public function Video(){

    //   return $this->hasMany('App\Video', 'foreign_key', 'name');
    // }
}
