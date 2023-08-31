<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'name'
    ];

    public function user() {
        return $this->belongsTo(
            User::class,
            'users_id'
        );
    }
}
