<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $title = 'Hapus data mata pelajaran?';
        $text = "Data tidak dapat dikembalikan!";
        confirmDelete($title, $text);

        $dataMapel = Mapel::withCount('guru')->get();
        return view('operator_datamapel.main',[
            'pageTitle' => 'Data Mata Pelajaran',
            'dataMapel' => $dataMapel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $mapel = new Mapel();
            $mapel->mapel_nama = $request->input('mapel');
            $mapel->save();
    
            Alert::success('Berhasil', 'Mapel berhasil ditambahkan');
            return response()->json([
                'success' => true,
                'message' => 'Mapel berhasil ditambahkan',
                'data' => $mapel
            ]);
        }catch(\Exception $e){
            Alert::error('Gagal', 'Mapel gagal ditambahkan');
        }   
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::findOrFail($id)->makeHidden(['created_at', 'updated_at', 'deleted_at']);
        return response()->json([
            'success' => true,
            'message' => 'Data mapel ditemukan',
            'data' => $mapel
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
    public function update(Request $request, string $id)
    {   
        try{
            $mapel = Mapel::findOrFail($id);
            $mapel->mapel_nama = $request->input('mapel');
    
            $mapel->save();
            Alert::success('Berhasil', 'Mapel berhasil diubah');
            return response()->json($mapel);
        }catch(\Exception $e){
            Alert::error('Gagal', 'Mapel gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        try{
            $mapel = Mapel::findOrFail($id);
            $mapel->delete();
            Alert::success('Berhasil', 'Mapel berhasil dihapus');
            return redirect('/datamapel');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Mapel gagal dihapus');
        }
    }
}
