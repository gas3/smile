<?php

namespace Smile\Core\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
	protected $table = 'hashtag';


    protected $fillable = [
        'post_id', 'tag'
    ];

    public function post()
    {
        return $this->belongsTo('Smile\Core\Persistence\Models\Post');
    }
}