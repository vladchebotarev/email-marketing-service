<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'list_id', 'email', 'first_name', 'last_name', 'company',
    ];

    /**
     * Get the list for the subscriber.
     */
    public function list()
    {
        return $this->belongsTo('App\SubscribersList');
    }
}
