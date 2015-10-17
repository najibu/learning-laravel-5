<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
    	'user_id' // temporary!!
    ];


    /**
     * Additional fields to treat as Carbon instances.
     *
     * @var array
     */
    protected $dates = ['published_at'];


    /**
     * Scope queries to articles that have been published.
     *
     * @param $query
     */
    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    
    /**
     * Set the published_at attribute.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * An article is owned by a user.
     *  
     * @return use Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
