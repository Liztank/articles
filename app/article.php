<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'article_id';
    public $timestamps = true;
}
