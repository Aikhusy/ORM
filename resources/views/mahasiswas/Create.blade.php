@extends('mahasiswas.layout') @section('content')
<div class="container mt-5">

<div class="row justify-content-center align-items-center">
<div class="card" style="width: 24rem;">
<div class="card-header"> Tambah Mahasiswa
</div>
<div class="card-body"> @if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your i
nput.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div> @endif
<form method="post" action="{{ route('mahasiswas.store') }}" id="myForm">
@csrf
<div class="form-group">
<label for="Nim">Nim</label>
<input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" >
</div>
<div class="form-group">
<label for="Nama">Nama</label>
<input type="Nama" name="Nama" class="form-control" id="Nama" aria-describedby="Nama" >
</div>
<div class="form-group">
<label for="Tetala">Tetala</label>
<input type="Tetala" name="Tetala" class="form-control" id="Tetala" aria-describedby="Tetala" >
</div>
<div class="form-group">
<label for="Kelas">Kelas</label>
<input type="Kelas" name="kelas_id" class="form-control" id="kelas_id" aria-describedby="password" >
</div>
<div class="form-group">
<label for="Jurusan">Jurusan</label>
<input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan" >
</div>
<div class="form-group">
<label for="Email">E-Mail</label>
<input type="Email" name="Email" class="form-control" id="Email" aria-describedby="Email" >
</div>
<div class="form-group">
<label for="No_Handphone">No_Handphone</label>
<input type="No_Handphone" name="No_Handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" >
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div> @endsection
