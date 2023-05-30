<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'excerpt', 'body', 'image_path', 'is_published', 'min_to_read'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meta(){
        return $this->hasOne(PostMeta::class);
    }

    // protected $table = 'posts';

    // protected $primaryKey = 'title';

    // protected $timestamps = false;

    // protected $dateTime = 'U';

    // protected $connection = 'sqlite';

    // protected $attributes = [
    //     'is_published' => true
    // ];
}
