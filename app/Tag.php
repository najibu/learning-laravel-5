<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
     * Fillabe fields for a tag.
     *  
     * @var array
     */
	protected $fillable = [
		'name'
	];

    /**
     * Get the articles associated with a given tag.
     *  
     * @return use Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
