<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('operator_dataoperator.main', [
            'pageTitle' => 'Data Operator',
            'operators' => Operator::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator_dataoperator.create', [
            'pageTitle' => 'Tambah Operator',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $rulesValidate = $request->validate([
            'operator_nama' => ['required','regex:/^[a-zA-Z\'\`\s]+$/', 'max:255'],
            'operator_username' => ['required', 'unique:operator,operator_username','max:255'],
            'operator_jenis_kelamin' => ['required'],
            'operator_email' => ['required','unique:operator,operator_email'],
            'operator_nomor_telepon' => ['required', 'unique:operator,operator_nomor_telepon','max:15'],
            'operator_alamat' => ['nullable'],
            'operator_password' => ['required', 'min:6'],
            'operator_confirm_password' => ['required', 'same:operator_password'],
        ],[
            'operator_nama.required' => 'Nama wajib diisi.',
            'operator_nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'operator_nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            
            'operator_username.required' => 'Username wajib diisi.',
            'operator_username.unique' => 'Username sudah terdaftar',
            'operator_username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            
            'operator_jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',

            'operator_email.required' => 'Email wajib diisi.',
            'operator_email.unique' => 'Email sudah terdaftar',
            
            'operator_nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'operator_nomor_telepon.unique' => 'Nomor telepon sudah terdaftar',
            'operator_nomor_telepon.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
            
            'operator_password.required' => 'Password wajib diisi.',
            'operator_password.min' => 'Password harus memiliki minimal 6 karakter.',
            
            'operator_confirm_password.required' => 'Konfirmasi password wajib diisi.',
            'operator_confirm_password.same' => 'Konfirmasi password tidak sama',
        ]);
        

        $rulesValidate['operator_password'] = Hash::make($request->operator_password);

        $operatorData = [
            'operator_nama' => $rulesValidate['operator_nama'],
            'operator_username' => $rulesValidate['operator_username'],
            'operator_email' => $rulesValidate['operator_email'],
            'password' => $rulesValidate['operator_password'],
            'operator_jenis_kelamin' => $rulesValidate['operator_jenis_kelamin'],
            'operator_alamat' => $rulesValidate['operator_alamat'] ? $rulesValidate['operator_alamat'] : '',
            'operator_nomor_telepon' => $rulesValidate['operator_nomor_telepon'],
            'operator_kode' => '',
            'operator_is_aktif' => 1
        ];

        $operator = Operator::create($operatorData);
        $operator->operator_kode = 'OPR' . $operator->id;
        $operator->save();

        Alert::success('Berhasil', 'Data operator berhasil ditambahkan');
        return redirect('/dataoperator')->with('success', 'Data operator berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $operator = Operator::findOrFail($id)->makeHidden(['operator_is_aktif','operator_password', 'created_at', 'updated_at', 'deleted_at', 'remember_token']);
        $operator->operator_jenis_kelamin = $operator->operator_jenis_kelamin ? 'Laki-laki' : 'Perempuan';
        return response()->json([
            'success' => true,
            'message' => 'Data operator ditemukan',
            'data' => $operator
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getStatus(Request $request){
        $operator = Operator::select('operator_nama', 'operator_is_aktif')->findOrFail($request->id);
        return response()->json([
            'success' => true,
            'message' => 'Status operator ditemukan',
            'data' => $operator
        ]);
    }

    public function updateStatus(Request $request, $id){
        try{
            $operator = Operator::findOrFail($id);
            $operator->operator_is_aktif = $request->input('status');
            $operator->save();

            session()->flash('success', 'Status operator berhasil diubah');

        }catch(\Exception $e){
            session()->flash('error', 'Status operator gagal diubah');
        }
        
        Alert::success('Berhasil', 'Status operator berhasil diubah');
        return response()->json($operator);
    }
}
