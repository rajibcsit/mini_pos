<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Geating array for category option
     */

    public static function arrayForSelect(){
        $array = [];
        $categories = Category::all();
        foreach ( $categories as $category){
            $array[$category->id] = $category->title;
          }
          return $array;
    }
}
