<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KelasTingkatan;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'kelas';

    public function wali_kelas(){
        return $this->belongsTo(Guru::class, 'kelas_guru_wali_id');
    }

    public function jadwal_list(){
        return $this->hasMany(JadwalList::class);
    }

}
