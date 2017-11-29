<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
     protected $table = 'category_detail';
    
    protected $fillable = ['categoryID','name','url','parentID'];

    protected $primaryKey = 'categoryID';

    public function category(){
        return $this->belongTo('App\Product','categoryID','categoryID');
    }
}
?>