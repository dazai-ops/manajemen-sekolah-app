<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\KelasTingkatan;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $title = 'Hapus data siswa!';
        $text = "Apakah anda yakin untuk menghapus data ini?";
        confirmDelete($title, $text);

        $dataSiswa = Siswa::with('kelas')->get();
        foreach($dataSiswa as $siswa){
            $siswa->siswa_jenis_kelamin = $siswa->siswa_jenis_kelamin ? 'Laki laki' : 'Perempuan';
        }
        return view('operator_datasiswa.main', [
            'pageTitle' => 'Data Siswa',
            'dataSiswa' => $dataSiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $dataKelas = Kelas::all();
        return view('operator_datasiswa.create', [
            'pageTitle' => 'Tambah Data Siswa',
            'dataKelas' => $dataKelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        // dd($request);
        $rulesValidate = $request->validate([
            'siswa_nama' => ['required','regex:/^[a-zA-Z\'\`\s]+$/', 'max:255'],
            'siswa_nisn' => ['required', 'unique:siswa,siswa_nisn','size:10'],
            'siswa_jenis_kelamin' => ['required'],
            'siswa_alamat' => ['required'],
            'siswa_nomor_telepon' => ['required','digits_between:10,15'],
            'siswa_kelas' => ['required'],
            'siswa_tempat_lahir' => ['required'],
            'siswa_tanggal_lahir' => ['required'],
            'siswa_foto' => ['nullable','image','mimes:jpeg,jpg,png','max:1024'],
        ],[
            'siswa_nama.required' => 'Nama siswa tidak boleh kosong',
            'siswa_nama.regex' => 'Nama siswa hanya boleh mengandung huruf dan spasi',
            'siswa_nama.max' => 'Nama siswa tidak boleh lebih dari 255 karakter',
            'siswa_nisn.required' => 'NISN tidak boleh kosong',
            'siswa_nisn.unique' => 'NISN telah terdaftar',
            'siswa_nisn.size' => 'NISN harus 10 digit',
            'siswa_jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
            'siswa_nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
            'siswa_nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'siswa_nomor_telepon.digits_between' => 'Nomor telepon harus terdiri dari 10 hingga 15 digit',
            'siswa_kelas.required' => 'Kelas harus dipilih',
            'siswa_alamat.required' => 'Alamat lengkap tidak boleh kosong',
            'siswa_tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
            'siswa_tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'siswa_tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid',
            'siswa_foto.image' => 'File harus berupa gambar',
            'siswa_foto.mimes' => 'Gambar harus berformat jpeg, jpg, atau png',
            'siswa_foto.max' => 'Ukuran gambar tidak boleh lebih dari 1 MB',
        ]);

        $fileName = $request->file('siswa_foto') ? Str::uuid(). '.' .$request->file('siswa_foto')->getClientOriginalExtension() : null;

        if($request->file('siswa_foto')) {
            $request->file('siswa_foto')->storeAs('public/foto_siswa', $fileName);
        }

        $siswaData = [
            'siswa_nama' => $rulesValidate['siswa_nama'],
            'siswa_nisn' => $rulesValidate['siswa_nisn'],
            'siswa_jenis_kelamin' => $rulesValidate['siswa_jenis_kelamin'],
            'siswa_alamat' => $rulesValidate['siswa_alamat'] ? $rulesValidate['siswa_alamat'] : '',
            'siswa_kelas_id' => $rulesValidate['siswa_kelas'],
            'siswa_nomor_telepon' => $rulesValidate['siswa_nomor_telepon'],
            'siswa_tempat_lahir' => $rulesValidate['siswa_tempat_lahir'],
            'siswa_tanggal_lahir' => $rulesValidate['siswa_tanggal_lahir'],
            'siswa_foto' => $fileName ? $fileName : '',
        ];


        $siswa = new Siswa();
        $siswa->fill($siswaData);
        $siswa->save();

        Alert::success('Berhasil', 'Data siswa berhasil ditambahkan');

        return redirect('/datasiswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::with('kelas')->find($id)->makeHidden(['created_at', 'updated_at', 'deleted_at']);
        $siswa->siswa_jenis_kelamin = $siswa->siswa_jenis_kelamin ? 'Laki-laki' : 'Perempuan';
        $siswa->siswa_tanggal_lahir = date('d-m-Y', strtotime($siswa->siswa_tanggal_lahir));
        // $siswa->siswa_kelas_id = Kelas::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Data siswa ditemukan',
            'data' => [
                'siswa' => $siswa
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $dataSiswa = Siswa::with('kelas')->find($id);
        $dataKelas = Kelas::all();
        return view('operator_datasiswa.edit', [
            'pageTitle' => 'Edit Data Siswa',
            'dataSiswa' => $dataSiswa,
            'dataKelas' => $dataKelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $siswa = Siswa::find($id);

        $rulesValidate = [
            'siswa_nama' => ['required', 'regex:/^[a-zA-Z\'\`\s]+$/', 'max:255'],
            'siswa_nisn' => ['required', 'size:10'],
            'siswa_jenis_kelamin' => ['required'],
            'siswa_nomor_telepon' => ['required', 'numeric', 'digits_between:10,15'], // Adjusting for phone number length
            'siswa_kelas' => ['required'],
            'siswa_alamat' => ['required'],
            'siswa_tempat_lahir' => ['required'],
            'siswa_tanggal_lahir' => ['required', 'date'],
            'siswa_foto' => ['image', 'mimes:jpeg,jpg,png', 'max:1024'],
        ];
        
        if ($request->filled('siswa_nisn') && $request->siswa_nisn != $siswa->siswa_nisn) {
            $rulesValidate['siswa_nisn'] = ['required', 'size:10', 'unique:siswa,siswa_nisn'];
        } else {
            $rulesValidate['siswa_nisn'] = ['required', 'size:10'];
        }
        
        $validatedData = $request->validate($rulesValidate, [
            'siswa_nama.required' => 'Nama siswa tidak boleh kosong',
            'siswa_nama.regex' => 'Nama siswa hanya boleh mengandung huruf dan spasi',
            'siswa_nama.max' => 'Nama siswa tidak boleh lebih dari 255 karakter',
            'siswa_nisn.required' => 'NISN tidak boleh kosong',
            'siswa_nisn.size' => 'NISN harus 10 digit',
            'siswa_jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
            'siswa_nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
            'siswa_nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
            'siswa_nomor_telepon.digits_between' => 'Nomor telepon harus terdiri dari 10 hingga 15 digit',
            'siswa_kelas.required' => 'Kelas harus dipilih',
            'siswa_alamat.required' => 'Alamat lengkap tidak boleh kosong',
            'siswa_tempat_lahir.required' => 'Tempat lahir tidak boleh kosong',
            'siswa_tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'siswa_tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid',
            'siswa_foto.image' => 'File harus berupa gambar',
            'siswa_foto.mimes' => 'Gambar harus berformat jpeg, jpg, atau png',
            'siswa_foto.max' => 'Ukuran gambar tidak boleh lebih dari 1 MB',
        ]);
        
        $fileName = $request->file('siswa_foto') ? Str::uuid() . '.' . $request->file('siswa_foto')->getClientOriginalExtension() : $siswa->siswa_foto;

        if ($request->file('siswa_foto')) {
            if ($siswa->siswa_foto) {
                Storage::delete('public/foto_siswa/' . $siswa->siswa_foto);
            }
            $request->file('siswa_foto')->storeAs('public/foto_siswa', $fileName);
        }

        $siswa->update([
            'siswa_nama' => $validatedData['siswa_nama'],
            'siswa_nisn' => $validatedData['siswa_nisn'],
            'siswa_jenis_kelamin' => $validatedData['siswa_jenis_kelamin'],
            'siswa_nomor_telepon' => $validatedData['siswa_nomor_telepon'],
            'siswa_kelas_id' => $validatedData['siswa_kelas'], // Assuming this is the correct field name in your model
            'siswa_alamat' => $validatedData['siswa_alamat'],
            'siswa_tempat_lahir' => $validatedData['siswa_tempat_lahir'],
            'siswa_tanggal_lahir' => $validatedData['siswa_tanggal_lahir'],
            'siswa_foto' => $fileName
        ]);

        Alert::success('Berhasil', 'Data siswa berhasil diperbarui');

        return redirect('/datasiswa');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        Alert::success('Berhasil', 'Data siswa berhasil dihapus');
        return redirect('/datasiswa');
    }
}
