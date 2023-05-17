<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);// Mengambil semua isi tabel
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
        return view('mahasiswas.index', compact('mahasiswas'));
        // with('i', (request()->input('page', 1) - 1) * 5);
    }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Tetala' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nim)
    {
        $Mahasiswa = Mahasiswa::find($Nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nim)
    {
        $Mahasiswa = Mahasiswa::where('Nim',$Nim)->first();
        return view('mahasiswas.edit', compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nim)
    {
        $validateData=
            $request->validate
        ([
            'Nim' => 'required',
            'Nama' => 'required',
            'Tetala' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);
           //fungsi eloquent untuk mengupdate data inputan kita
        Mahasiswa::where('Nim',$Nim)->update($validateData);
           //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
           
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nim)
    {
        Mahasiswa::where('Nim',$Nim)->delete();
        return redirect()->route('mahasiswas.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function find(Request $request)
    {
        $search = $request->input('search');

        $mahasiswas = Mahasiswa::where('Nama', 'LIKE', "%$search%")
                            ->orderBy('Nim', 'desc')
                            ->paginate(5);

        return view('mahasiswas.index', compact('mahasiswas'));
    }
}
