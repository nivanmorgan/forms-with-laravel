<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'store_url', 'quality_level', 'experience_level', 'business_level'
    ];
    protected $hidden = [
        'seller_id'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id','id');
    }
}
