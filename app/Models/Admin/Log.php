<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "users_id",
        "clients_id",
        "updated_by",
        "name",
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public function client() {
        return $this->belongsTo(
            Client::class,
            "clients_id"
        );
    }

    public function user() {
        return $this->belongsTo(
            User::class,
            "users_id"
        );
    }

    public function userUpdatedBy() {
        return $this->belongsTo(
            User::class,
            "updated_by"
        );
    }
}
