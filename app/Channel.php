<?php

namespace App;



use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{
    use HasMediaTrait;

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }


    public function image(){
        //to get the image url
        if ($this->media()->first()){
            return $this->media()->first()->getFullUrl('thumbnail');
        }
        return null;

    }
    public function editable(){
        if(!auth()->check())
            return false;
        else{
            return $this->user_id==auth()->user()->id;
        }
    }


    public function registerMediaConversions(Media $media = null)
    {
        // TODO: Implement registerMediaConversions() method.
        $this->addMediaConversion('thumbnail')
            ->width(100)
            ->height(130);
    }
}
