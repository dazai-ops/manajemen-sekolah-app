<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
        $title = 'Hapus data!';
        $text = "Yakin, hapus data fasilitas ini?";
        confirmDelete($title, $text);

        $dataFasilitasKelas = Fasilitas::all();
        return view('operator_datafasilitas.main', [
            'pageTitle' => 'Data Fasilitas',
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
        $fasilitas = new Fasilitas();
        $fasilitas->fasilitas_nama = $request->input('fasilitas');
        $fasilitas->save();
        return response()->json([
            'success' => true,
            'message' => 'Data fasilitas berhasil ditambahkan',
            'data' => $fasilitas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id)->makeHidden(['created_at', 'updated_at', 'deleted_at']);
        return response()->json([
            'success' => true,
            'message' => 'Data fasilitas ditemukan',
            'data' => $fasilitas
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
            $fasilitas = Fasilitas::findOrFail($id);
            $fasilitas->fasilitas_nama = $request->input('fasilitas');
            $fasilitas->save();
            return response()->json([
                'success' => true,
                'message' => 'Data fasilitas berhasil diperbarui',
                'data' => $fasilitas
            ]);
        }catch(\Exception $e){
            Alert::error('Gagal', 'Data fasilitas gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();
        Alert::success('Berhasil', 'Data fasilitas berhasil dihapus');
        return redirect('/fasilitas');
    }
}
