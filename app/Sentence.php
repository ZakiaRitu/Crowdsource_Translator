<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sentence extends Model
{
   // use SoftDeletes;
    protected $table = "sentences";
   // protected $dates = ['deleted_at'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Sentence Has many Translation
     */
    public function translations(){
        return $this->hasMany('App\Translation','sentence_id','id');
    }


}
