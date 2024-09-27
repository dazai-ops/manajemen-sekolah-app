<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'siswa';

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'siswa_kelas_id');
    }
}
