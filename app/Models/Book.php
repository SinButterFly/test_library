<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'book_name', 'author', 'category_id', 'tag_id', 'photo', 'shelf_id'
    ];

    public function shelf(){
        return $this->belongsTo(Shelf::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
