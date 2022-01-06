<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $fillable = [
        'user_Id',
        'jumlah_honor',
        'potongan',
        'jumlah_diterima',
        'keterangan',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
