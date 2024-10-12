<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;
use App\Models\JadwalList;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel'; 
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'guru_mapel');
    }

    public function jadwal_list()
    {
        return $this->hasMany(JadwalList::class);
    }
}
