<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $title = 'Hapus data guru?';
        $text = "Data tidak dapat dikembalikan!";
        confirmDelete($title, $text);

        $dataGuru = Guru::with('mapel')->get();
        return view('operator_dataguru.main', [
            'pageTitle' => 'Data Guru',
            'dataGuru' => $dataGuru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $dataMapel = Mapel::all();
        return view('operator_dataguru.create', [
            'pageTitle' => 'Tambah Data Guru',
            'dataMapel' => $dataMapel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulesValidate = $request->validate([
            'guru_nama' => ['required','regex:/^[a-zA-Z\'\`\s]+$/', 'max:255'],
            'guru_nip' => ['required', 'unique:guru,guru_nip','size:18'],
            'guru_jenis_kelamin' => ['required'],
            'guru_mapel' => ['required','array','min:1'],
            'guru_mapel.*' => ['exists:mapel,id'],
            'guru_tempat_lahir' => ['required'],
            'guru_tanggal_lahir' => ['required'],
            'guru_jenis_kelamin' => ['required'],
            'guru_nomor_telepon' => ['required','unique:guru,guru_nomor_telepon'],
            'guru_alamat' => ['nullable'],
            'guru_foto' => ['nullable','image','mimes:jpeg,jpg,png','max:1024'],
        ],[
            'guru_nama.required' => 'Nama guru tidak boleh kosong',
            'guru_nama.regex' => 'Karakter pada nama tidak valid',
            'guru_nama.max' => 'Nama guru terlalu panjang',

            'guru_nip.required' => 'NIP guru tidak boleh kosong',
            'guru_nip.unique' => 'NIP guru sudah terdaftar',
            'guru_nip.size' => 'Panjang NIP guru harus 18 karakter',

            'guru_jenis_kelamin.required' => 'Jenis kelamin guru tidak boleh kosong',

            'guru_mapel.required' => 'Mapel guru tidak boleh kosong',

            'guru_tempat_lahir.required' => 'Tempat lahir guru tidak boleh kosong',

            'guru_tanggal_lahir.required' => 'Tanggal lahir guru tidak boleh kosong',

            'guru_nomor_telepon.required' => 'Nomor telepon guru tidak boleh kosong',
            'guru_nomor_telepon.unique' => 'Nomor telepon guru sudah terdaftar',

            'guru_foto.image' => 'File harus berupa jpeg, jpg, png',
            'guru_foto.max' => 'Ukuran file terlalu besar',
        ]);

        $fileName = $request->file('guru_foto') ? Str::uuid(). '.' .$request->file('guru_foto')->getClientOriginalExtension() : null;

        if($request->file('guru_foto')) {
            $request->file('guru_foto')->storeAs('public/foto_guru', $fileName);
        }

        $guruData = [
            'guru_nama' => $rulesValidate['guru_nama'],
            'guru_nip' => $rulesValidate['guru_nip'],
            'guru_tempat_lahir' => $rulesValidate['guru_tempat_lahir'],
            'guru_tanggal_lahir' => $rulesValidate['guru_tanggal_lahir'],
            'guru_jenis_kelamin' => $rulesValidate['guru_jenis_kelamin'],
            'guru_alamat' => $rulesValidate['guru_alamat'] ? $rulesValidate['guru_alamat'] : '',
            'guru_nomor_telepon' => $rulesValidate['guru_nomor_telepon'],
            'guru_foto' => $fileName ? $fileName : '',
        ];


        $guru = new Guru();
        $guru->fill($guruData);
        $guru->save();

        $guru->mapel()->attach($rulesValidate['guru_mapel']);

        Alert::success('Berhasil', 'Data guru berhasil ditambahkan');

        return redirect('/dataguru')->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::find($id)->makeHidden(['created_at', 'updated_at', 'deleted_at', 'guru_foto']);
        $guru->guru_tanggal_lahir = date('d-m-Y', strtotime($guru->guru_tanggal_lahir));
        $guru->guru_jenis_kelamin = $guru->guru_jenis_kelamin ? 'Laki-laki' : 'Perempuan';

        $namaMapel = $guru->mapel()->pluck('mapel_nama')->implode(', ');

        return response()->json([
            'success' => true,
            'message' => 'Data guru ditemukan',
            'data' => [
                'detail_guru' => $guru,
                'mapel_diampu' => $namaMapel
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $detailGuru = Guru::find($id);
        $mapelGuru = $detailGuru->mapel()->get();
        $dataMapel = Mapel::all();
        return view('operator_dataguru.edit', [
            'pageTitle' => 'Edit Data Guru',
            'detailGuru' => $detailGuru,
            'mapelGuru' => $mapelGuru,
            'dataMapel' => $dataMapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {  
        // dd($request);
        $guru = Guru::find($id);

        $rulesValidate = [
            'guru_nama' => ['required', 'regex:/^[a-zA-Z\'\`\s]+$/', 'max:255'],
            'guru_jenis_kelamin' => ['required'],
            'guru_mapel' => ['required', 'array', 'min:1'],
            'guru_mapel.*' => ['exists:mapel,id'],
            'guru_alamat' => ['nullable'],
            'guru_tempat_lahir' => ['required'],
            'guru_tanggal_lahir' => ['required'],
            'guru_foto' => ['image', 'mimes:jpeg,jpg,png', 'max:1024'],
        ];

        // Validasi NIP dan nomor telepon jika ada perubahan
        if ($request->filled('guru_nip') && $request->guru_nip != $request->guru_nip_old) {
            $rulesValidate['guru_nip'] = ['required', 'size:18', 'unique:guru,guru_nip'];
        } else {
            $rulesValidate['guru_nip'] = ['required', 'size:18'];
        }

        if ($request->filled('guru_nomor_telepon') && $request->guru_nomor_telepon != $request->guru_nomor_telepon_old) {
            $rulesValidate['guru_nomor_telepon'] = ['required', 'unique:guru,guru_nomor_telepon'];
        } else {
            $rulesValidate['guru_nomor_telepon'] = ['required'];
        }

        // Lakukan validasi
        $validatedData = $request->validate($rulesValidate, [
            'guru_nama.required' => 'Nama guru tidak boleh kosong',
            'guru_nama.regex' => 'Karakter pada nama tidak valid',
            'guru_nama.max' => 'Nama guru terlalu panjang',
            'guru_jenis_kelamin.required' => 'Jenis kelamin guru tidak boleh kosong',
            'guru_nip.required' => 'NIP guru tidak boleh kosong',
            'guru_nip.size' => 'Panjang NIP guru harus 18 karakter',
            'guru_nip.unique' => 'NIP tersebut telah terdaftar',
            'guru_nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
            'guru_nomor_telepon.unique' => 'Nomor telepon tersebut telah terdaftar',
            'guru_mapel.required' => 'Mapel guru tidak boleh kosong',
            'guru_tempat_lahir.required' => 'Tempat lahir guru tidak boleh kosong',
            'guru_tanggal_lahir.required' => 'Tanggal lahir guru tidak boleh kosong',
            'guru_foto.image' => 'File harus berupa jpeg, jpg, png',
            'guru_foto.max' => 'Ukuran file terlalu besar, maksimal 1 MB',
        ]);

        // Cek jika ada file yang diupload
        $fileName = $request->file('guru_foto') ? Str::uuid() . '.' . $request->file('guru_foto')->getClientOriginalExtension() : $guru->foto;

        if ($request->file('guru_foto')) {
            if ($guru->foto) {
                Storage::delete('public/foto_guru/' . $guru->foto);
            }
            $request->file('guru_foto')->storeAs('public/foto_guru', $fileName);
        }

        // Update data guru
        $guru->update([
            'guru_nama' => $validatedData['guru_nama'],
            'guru_nip' => $validatedData['guru_nip'],
            'guru_tempat_lahir' => $validatedData['guru_tempat_lahir'],
            'guru_tanggal_lahir' => $validatedData['guru_tanggal_lahir'],
            'guru_jenis_kelamin' => $validatedData['guru_jenis_kelamin'],
            'guru_alamat' => $validatedData['guru_alamat'],
            'guru_nomor_telepon' => $validatedData['guru_nomor_telepon'],
            'guru_foto' => $fileName,
        ]);

        // Sinkronisasi mapel
        $guru->mapel()->sync($validatedData['guru_mapel']);

        Alert::success('Berhasil', 'Data guru berhasil diperbarui');

        return redirect('/dataguru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        Alert::success('Berhasil', 'Data guru berhasil dihapus');
        return redirect('/dataguru');
        
    }
}
