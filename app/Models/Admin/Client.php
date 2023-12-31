<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id',
        'name',
        'deleted_at',
        "created_at",
        "updated_at"
    ];

    public function user() {
        return $this->belongsTo(
            User::class,
            'users_id'
        );
    }
}
