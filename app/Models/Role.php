<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['name'];

    public const IS_CUSTOMER = 1;
    public const IS_MANAGER = 2;
    public const IS_SUPPORT = 3;
    public const IS_ADMIN = 4;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User');
    }
}
