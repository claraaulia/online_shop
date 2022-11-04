<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
     'nama',
     'harga',
     'deskripsi',
     'gambar',
     'discount',
     'category_id'
  ];

  public function category()
  {
    return$this->belongsTo(category::class);
  }
}
