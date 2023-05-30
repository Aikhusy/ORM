
@extends('mahasiswas.layout') 

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div style="text-align: center;">
            <h2>Kartu Hasil Studi (KHS) </h2>
        </div>
        <style>
            .label {
                display: inline-block;
                width: 70px;
                text-align: left;
            }
        </style>
        @foreach($tabelMahasiswa as $mahasiswa)
            <h5><span class="label">Nama:</span> {{ $mahasiswa->Nama }}</h5>
            <h5><span class="label">Nim:</span> {{ $mahasiswa->Nim }}</h5>
            <h5><span class="label">Kelas:</span> {{ $mahasiswa->nama_kelas }}</h5>
        @endforeach

    </div>
</div> 
<table class="table table-bordered">
    <tr>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Semester</th>
        <th>Nilai</th>
    </tr>
    @foreach ($result as $Mahasiswa)
    <tr>

    <td>{{ $Mahasiswa->nama_matkul }}</td>
    <td>{{ $Mahasiswa->sks }}</td>
    <td>{{ $Mahasiswa->semester }}</td>
    <td>{{ $Mahasiswa->nilai }}</td>

    </tr> @endforeach
</table>

<a class="btn btn-success mt-3" href="{{ route('mahasiswas.index') }}">Kembali</a>
@endsection
