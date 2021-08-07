<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $table = 'sellers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first', 'last', 'portfolio_url', 'has_store'
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
