<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Genre;
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'publication','genre','image','user_id'];

   public function user(){
    return $this->belongsTo(User::class);

   }

   public function genres(){
    return $this->belongsToMany(Genre::class);
    
   }
}
