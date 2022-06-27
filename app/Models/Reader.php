<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $table = 'readers';
    protected $fillable = [
        'date_reg', 'reader_name', 'date_born', 'book_id'
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
