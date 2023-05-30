<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
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
        $mahasiswa = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('Nim', 'asc')->paginate(3);
        return view('mahasiswas.index',['mahasiswa'=>$mahasiswa, 'paginate'=>$paginate]);
        // with('i', (request()->input('page', 1) - 1) * 5);
    }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas_list= Kelas::all();
        return view('mahasiswas.create',compact('kelas_list'));
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
            'kelas_id' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        $mahasiswa = new Mahasiswa;
        $mahasiswa->Nim=$request->get('Nim');
        $mahasiswa->Nama=$request->get('Nama');
        $mahasiswa->Tetala=$request->get('Tetala');
        $mahasiswa->kelas_id=$request->get('kelas_id');
        $mahasiswa->Jurusan=$request->get('Jurusan');
        $mahasiswa->Email=$request->get('Email');
        $mahasiswa->No_Handphone=$request->get('No_Handphone');

        $kelas=new Kelas;
        $kelas->id=$request->get('kelas_id');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

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
        $kelas_list= Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas_list'));
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
            'kelas_id' => 'required',
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
    public function ngecek(Request $request)
    {
    // Proses penyimpanan data atau logika lainnya

    // Gunakan dd() untuk melihat nilai variabel setelah formulir dikirim
    dd($request->all());
    
    // Redirect atau respon lainnya setelah proses penyimpanan
    }
}
