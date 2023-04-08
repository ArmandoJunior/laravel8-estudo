<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'body', 'slug', 'start_event'];

    protected $dates = ['start_event'];

    public function getOwnerNameAttribute()
    {
        return ucwords($this->owner->name)??"Não encontrado";
    }

    public function getDescriptionAttribute()
    {
//        dd($this->attributes['description']);
        return "Descrição: " . $this->attributes['description'];
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setStartEventAttribute($value)
    {
//        $datetime = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString();
        $this->attributes['start_event'] = $value;
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
}
