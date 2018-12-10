<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribersList extends Model
{
    /**
     * Get the user for the list.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the list of subscribers for the list.
     */
    public function subscribers()
    {
        return $this->hasMany('App\Subscriber');
    }
}
