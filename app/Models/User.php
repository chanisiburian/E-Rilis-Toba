<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'user_id',
    //     'nama',
    //     'username',
    //     'email',
    //     'telepon',
    //     'level_id',
    //     'password',
    //     'media_digital',
    //     'nama_perusahaan',
    //     'url_mitra',
    //     'nib',
    //     'no_rekening',
    //     'ktp',
    //     'kta',
    //     'npwp',
    //     'dihapus',
    // ];

    protected $hidden = [
        'password'
    ];


    // public $timestamps = false;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
