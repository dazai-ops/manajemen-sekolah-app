<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KelasTingkatan;
use App\Models\Guru;
use App\Models\JadwalList;
use App\Models\Fasilitas;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function wali_kelas(){
        return $this->belongsTo(Guru::class, 'kelas_guru_wali_id');
    }

    public function jadwal_list(){
        return $this->hasMany(JadwalList::class);
    }

    public function fasilitas(){
        return $this->belongsToMany(Fasilitas::class, 'kelas_fasilitas');
    }

}
