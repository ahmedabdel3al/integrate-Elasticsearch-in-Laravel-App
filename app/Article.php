<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;
    protected $fillable = ['title', 'body'];
    protected $casts = [
        'tags' => 'json',
    ];
}
