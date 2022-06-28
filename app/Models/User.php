<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $with = ['division','honor'];

    protected $fillable = [
        'name',
        'golongan',
        'division_id',
        'fungsional',
        'username',
        'rekening',
        'bank',
        'password',
        'role',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function honor()
    {
        return $this->hasMany(Honor::class)->orderBy('created_at', 'DESC');
    }

}
