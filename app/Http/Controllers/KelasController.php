<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Fasilitas;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        $title = 'Hapus data!';
        $text = "Yakin, hapus data kelas ini?";
        confirmDelete($title, $text);

        $dataGuru = Guru::all();
        $dataFasilitasKelas = Fasilitas::all();
        $dataKelas = Kelas::with('wali_kelas', 'fasilitas')->get();
        return view('operator_datakelas.main', [
            'pageTitle' => 'Data Kelas',
            'dataKelas' => $dataKelas,
            'dataGuru' => $dataGuru,
            'dataFasilitasKelas' => $dataFasilitasKelas
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

        try{
            $request->validate([
                'kelas_nama_tambah' => 'required|string|max:255',
                'nama_guru_tambah' => 'required|exists:guru,id',
                'kelas_fasilitas_tambah' => 'required|array',
                'kelas_fasilitas_tambah.*' => 'exists:fasilitas,id',
            ]);

            $kelas = new Kelas();
            $kelas->kelas_nama = $request->kelas_nama_tambah;
            $kelas->kelas_guru_wali_id = $request->nama_guru_tambah;
            $kelas->save();
            $kelas->fasilitas()->sync($request->kelas_fasilitas_tambah);
            return response()->json([
                'success' => true,
                'message' => 'Data kelas berhasil ditambahkan',
                'data' => $kelas
            ]);
        }catch(\Exception $e){
            Alert::error('Gagal', 'Data kelas gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::with('wali_kelas')->findOrFail($id)->makeHidden(['kelas_guru_wali_id','created_at', 'updated_at', 'deleted_at']);
        $kelas->nama_wali_kelas = $kelas->wali_kelas->guru_nama;
        $kelas->makeHidden(['wali_kelas']);

        $fasilitasIds = $kelas->fasilitas()->pluck('fasilitas_id')->toArray();
        $fasilitasKelas = Fasilitas::whereIn('id', $fasilitasIds)->get()->makeHidden(['created_at', 'updated_at', 'deleted_at']);

        return response()->json([
            'success' => true,
            'message' => 'Data kelas ditemukan',
            'data' => [
                'detail_kelas' => $kelas,
                'fasilitas' => $fasilitasKelas
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){   
        try{
            $request->validate([
                'kelas_nama_edit' => 'required|string|max:255',
                'nama_guru_edit' => 'required|exists:guru,id',
                'kelas_fasilitas_edit' => 'required|array',
                'kelas_fasilitas_edit.*' => 'exists:fasilitas,id',
            ]);
        
            $kelas = Kelas::findOrFail($id);
            $kelas->kelas_nama = $request->kelas_nama_edit;
            $kelas->kelas_guru_wali_id = $request->nama_guru_edit;
            $kelas->save();
            $kelas->fasilitas()->sync($request->kelas_fasilitas_edit);
            return response()->json([
                'success' => true,
                'message' => 'Data kelas berhasil diperbarui',
                'data' => $kelas
            ]);
        }catch(\Exception $e){
            Alert::error('Gagal', 'Data kelas gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        Alert::success('Berhasil', 'Data kelas berhasil dihapus');
        return redirect('/datakelas');
    }

    public function getDataKelas($id){
        $kelas = Kelas::with('wali_kelas')->findOrFail($id)->makeHidden(['kelas_guru_wali_id','created_at', 'updated_at', 'deleted_at']);
        $fasilitasIds = $kelas->fasilitas()->pluck('fasilitas_id')->toArray();
        $fasilitasKelas = Fasilitas::whereIn('id', $fasilitasIds)->get()->makeHidden(['created_at', 'updated_at', 'deleted_at']);
        return response()->json([
            'success' => true,
            'message' => 'Data kelas ditemukan',
            'data' => [
                'detail_kelas' => $kelas,
                'fasilitas' => $fasilitasKelas
            ]
        ]);
    }
}
