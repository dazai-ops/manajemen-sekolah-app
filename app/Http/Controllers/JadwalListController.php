<?php

namespace App\Http\Controllers;

use App\Models\JadwalList;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $title = 'Hapus jadwal pelajaran';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        $dataKelas = Kelas::all();
        return view('operator_jadwal-pelajaran.main',[
            'pageTitle' => 'Jadwal Pelajaran',
            'dataKelas' => $dataKelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request);
        try{
            $jadwalList = new JadwalList();
            $jadwalList->guru_id = $request->input('guru');
            $jadwalList->kelas_id = $request->input('kelas');
            $jadwalList->mapel_id = $request->input('mapel');
            $jadwalList->hari = $request->input('hari');
            $jadwalList->jam_mulai = $request->input('jam_mulai');
            $jadwalList->jam_selesai = $request->input('jam_selesai');

            $jadwalList->save();
            Alert::success('Berhasil', 'Jadwal berhasil ditambahkan');
            return response()->json([
                'success' => true,
                'message' => 'Jadwal berhasil ditambahkan',
                'data' => $jadwalList
            ]);

        }catch(\Excption $e){
            Alert::error('Gagal', 'Jadwal gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($kelas_id)
    {
        $kelas = Kelas::find($kelas_id);
        $jadwal = JadwalList::with(['guru', 'mapel', 'kelas'])
            ->where('kelas_id', $kelas_id)
            ->whereIn('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'])
            ->orderBy('jam_mulai', 'asc')
            ->get();

        return view('operator_jadwal-pelajaran.show', [
            'jadwal' => $jadwal,
            'kelas' => $kelas,
            'pageTitle' => $kelas->kelas_nama, // Assign the page title
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kelas_id)
    {   

        $dataMapel = Mapel::all();
        $dataGuru = Guru::all();
        $kelas = Kelas::find($kelas_id);
        $jadwal = JadwalList::with(['guru', 'mapel', 'kelas'])
            ->where('kelas_id', $kelas_id)
            ->whereIn('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'])
            ->orderBy('jam_mulai', 'asc')
            ->get();

        return view('operator_jadwal-pelajaran.edit', [
            'jadwal' => $jadwal,
            'kelas' => $kelas,
            'dataMapel' => $dataMapel,
            'dataGuru' => $dataGuru,
            'pageTitle' => 'Jadwal Pelajaran', // Assign the page title
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalList $jadwalList, string $id)
    {

        try{
            $jadwalList = JadwalList::findOrFail($id);
            $jadwalList->kelas_id = $jadwalList->kelas_id;
            $jadwalList->mapel_id = $request->input('mapel');
            $jadwalList->guru_id = $request->input('guru');
            $jadwalList->hari = $jadwalList->hari;
            $jadwalList->jam_mulai = $request->input('jam_mulai');
            $jadwalList->jam_selesai = $request->input('jam_selesai');
    
            $jadwalList->save();
            Alert::success('Berhasil', 'Jadwal list berhasil diubah');
            return response()->json($jadwalList);
        }catch(\Exception $e){
            Alert::error('Gagal', 'Jadwal list gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        try {
            $jadwal = JadwalList::findOrFail($id);
            $jadwal->delete();
            return response()->json(['success' => 'Jadwal berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus jadwal!'], 500);
        }
    }

    public function jadwal_list($id){
        $jadwalList = JadwalList::findOrFail($id)->makeHidden(['created_at','updated_at']);
        
        return response()->json([
            'success' => true,
            'message' => 'Data jadwal list ditemukan',
            'data' => $jadwalList
        ]);

    }
}
