<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

	protected $fillable = array('name', 'description', 'video_path', 'video', 'user_id');
}
