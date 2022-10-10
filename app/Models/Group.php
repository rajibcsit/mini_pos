<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Geating array for group option
     */

    public static function arrayForSelect(){
        $array = [];
        $groups = Group::all();
        foreach ( $groups as $group){
            $array[$group->id] = $group->title;
          }
          return $array;
    }
}
