<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 
                           'slug',
                           'excerpt',
                           'body',
                           'user_id',
                           'category_id'
                        ];
    // bisa pake guarded artinya selain ini gk boleh di isi
    // protected $guarded = ['id'];

    protected $with = ['category', 'author'];


    // menghubungkan model post dengan model kategori
    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
