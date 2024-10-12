<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    public function kelas(){
        return $this->belongsToMany(Kelas::class, 'kelas_fasilitas');
    }
}
