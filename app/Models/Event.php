<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['title', 'description', 'body', 'slug', 'start_event', 'banner'];

    protected $dates = ['start_event'];

    public function getOwnerNameAttribute()
    {
        return ucwords($this->owner->name)??"Não encontrado";
    }

//    public function setTitleAttribute($value)
//    {
//        $this->attributes['title'] = $value;
//        $this->attributes['slug'] = Str::slug($value);
//    }

    public function setStartEventAttribute($value)
    {
        try {
            $datetime = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString();
        } catch (\Exception $exception) {
            $datetime = $value;
        }
        $this->attributes['start_event'] = $datetime;
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(User::class)->withPivot('reference', 'status');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
