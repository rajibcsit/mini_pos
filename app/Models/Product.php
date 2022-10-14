<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','category_id','cost_price','price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }
    
    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }


     /**
     * Geating array for Product option
     */

    public static function arrayForSelect(){
        $array = [];
        $products = Product::all();
        foreach ( $products as $product){
            $array[$product->id] = $product->title;
          }
          return $array;
    }
}
