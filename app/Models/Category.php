<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
   //
   use HasFactory, Trans;
   protected $guarded = [];
   public function products()
   {
      return $this->hasMany(Product::class);
   }
   public function image()
   {
      return $this->morphOne(Image::class, 'imageable');
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