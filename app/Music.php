<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';

    protected $primaryKey = 'id';

    protected $fillable = ['title' , 'performer' , 'path', 'category','lyrics','source'];
}
