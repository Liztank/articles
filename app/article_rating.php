<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_rating extends Model
{
    protected $table = 'article_rating';
    public $primaryKey = 'article_id';
    public $timestamps = true;
}
