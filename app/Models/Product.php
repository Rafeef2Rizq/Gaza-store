<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{

   use HasFactory, Trans;
   protected $guarded = [];
   public function category()
   {
      return $this->belongsTo(Category::class)->withDefault();
   }
   public function image()
   {
      return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
   }
   public function gallery()
   {
      return $this->morphMany(Image::class, 'imageable')->where('type', 'gallery');
   }
   public function reviews()
   {
      return $this->hasMany(Review::class);
   }
   public function carts()
   {
      return $this->hasMany(Cart::class);
   }
   public function orderDetails()
   {
      return $this->hasMany(OrderDetail::class);
   }
   public function getImgPathAttribute()
   {
      return $this->image
         ? asset('images/' . $this->image->path)
         : asset('images/no/notfound.jpeg');

   }
   public function getTransNameAttribute()
   {
      $name = json_decode($this->name, true);
      return $name[app()->getLocale()] ?? $name['en'];
   }

   public function getTransDescriptionAttribute()
   {
      $description = json_decode($this->description, true);
      return $description[app()->getLocale()] ?? $description['en'];
   }
}
