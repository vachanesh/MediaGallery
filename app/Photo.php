<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

	protected $fillable = array('name', 'description', 'photo_path', 'photo', 'user_id');

}
