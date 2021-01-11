<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   public function user(){

       return $this->belongsTo('App\User', 'create_user_id', 'id');

   }

   protected $fillable = [
    'title', 'description', 'status', 'create_user_id' , 'updated_user_id' , 'deleted_user_id' , 'created_at' , 'updated_at' , 'deleted_at',
];

}
