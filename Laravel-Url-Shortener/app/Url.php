<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Url extends Model
{
    protected $fillable = [
        'user_id',
        'url',
        'token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Builder $builder
     * @param string $token
     * @return $this
     */
    public function scopeWhereToken(Builder $builder, string $token)
    {
        return $builder->where('token', $token);
    }
}
