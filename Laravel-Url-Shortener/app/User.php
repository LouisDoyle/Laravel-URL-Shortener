<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class User extends Model
{
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function urls()
    {
        return $this->hasMany(Url::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function passwordResets()
    {
        return $this->hasMany(PasswordReset::class);
    }

    /**
     * @param Builder $builder
     * @param string $email
     * @return $this
     */
    public function scopeWhereEmail(Builder $builder, string $email)
    {
        return $builder->where('email', $email);
    }
}
