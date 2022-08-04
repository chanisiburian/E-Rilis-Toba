<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'nama',
        'username',
        'email',
        'telepon',
        'level_id',
        'password',
        'media_digital',
        'nama_perusahaan',
        'url_mitra',
        'nib',
        'no_rekening',
        'ktp',
        'kta',
        'npwp',
        'dihapus',
    ];

    protected $hidden = [
        'password'
    ];
    protected $perimaryKey = "user_id";
    public $timestamps = false;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function barita()
    {
        return $this->hasMany(Berita::class,'berita_id','berita_id');
    }
}
