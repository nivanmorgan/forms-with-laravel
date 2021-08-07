<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $table = 'profiles';

    const BUSINESS_1 = "I'm  not interested in understanding business & marketing";
    const BUSINESS_2 = "I'm vaguely aware of basic business & marketing concepts";
    const BUSINESS_3 = "I'm familiar with some skills and some techniques, but I am not sure how to apply them when selling my creative work";
    const BUSINESS_4 = 'I have an extensive background in business and/or marketing';

    const Quality_1 = 'Quantity is more important to me than quality';
    const Quality_2 = 'I spend minimal time & effort it takes to create products that are acceptable quality';
    const Quality_3 = 'I try to get quality products out quickly, even if I need to take a shortcut now and then';
    const Quality_4 = 'I put in enough effort to make my product pretty high quality, but at some point my time is better spent elsewhere';
    const Quality_5 = "I don't care what it takes, my products are the highest quality possible";

    const Experience_1 = 'I am new to selling creative products online';
    const Experience_2 = 'I have experience selling through one online marketplace';
    const Experience_3 = 'I have experience selling through multiple marketplaces';
    const Experience_4 = 'I have experience selling only on my own website';
    const Experience_5 = 'I sell on multiple marketplaces and through my own website';
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
    /**
     * @return string
     */
    public function getBusinessLevelAttribute(): string
    {
        if ($this->business_level==1) {
            return self::BUSINESS_1;
        } elseif ($this->business_level==2) {
            return self::BUSINESS_2;
        } elseif ($this->business_level==3) {
            return self::BUSINESS_3;
        } elseif ($this->business_level==4) {
            return self::BUSINESS_4;
        }

    }
    /**
     * @return string
     */
    public function getQualityLevelAttribute(): string
    {
        if ($this->quality_level ==1) {
            return self::Quality_1;
        } elseif ($this->quality_level==2) {
            return self::Quality_2;
        } elseif ($this->quality_level==3) {
            return self::Quality_3;
        } elseif ($this->quality_level==4) {
            return self::Quality_4;
        }
        elseif ($this->quality_level==5) {
            return self::Quality_5;
        }

    }
    /**
     * @return string
     */
    public function getExperienceLevelAttribute(): string
    {
        if ($this->experience_level == 1) {
            return self::Experience_1;
        } elseif ($this->experience_level== 2) {
            return self::Experience_2;
        } elseif ($this->experience_level==3) {
            return self::Experience_3;
        } elseif ($this->experience_level==4) {
            return self::Experience_4;
        }
        elseif ($this->experience_level==5) {
            return self::Experience_5;
        }
    }
}
