<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PasswordReset extends Model
{
    protected $fillable = [
        'user_id',
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
     * @param User $user
     * @param string $token
     * @return mixed
     */
    public function scopeWhereUserAndToken(Builder $builder, User $user, string $token)
    {
        return $builder->where([
            'user_id' => $user->id,
            'token' => $token,
        ]);
    }
}
