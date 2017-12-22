<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryUserData extends Model
{
    protected $table = 'categories_userdata';
    protected $fillable = ['user_data_id', 'category_id'];
}
