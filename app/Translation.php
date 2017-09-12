<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Translation extends Model
{
   // use SoftDeletes;
    protected $table = "translations";
   // protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Translation belongs to User
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Translation belongs to Sentence
     */
    public function sentence()
    {
        return $this->belongsTo('App\Sentence','sentence_id','id');
    }

}
