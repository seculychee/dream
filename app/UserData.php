<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = "user_datas";

    protected $fillable = ["id", "name", "email", "phone_format", "phone"];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_userdata');
    }
}
