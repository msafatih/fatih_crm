<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'speed',
        'status',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'product_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'product_id');
    }
}
