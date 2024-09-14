<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'descripton'];
    public function listNews()
    {
        return $this->hasMany(News::class, 'category_id');
        
    }
    public function listBooks()
    {
        return $this->hasMany(Books::class, 'category_id');
    }
}
