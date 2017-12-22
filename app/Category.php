<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'name'];

    public function userData()
    {
        return $this->belongsToMany(UserData::class, 'categories_userdata');
    }

}
