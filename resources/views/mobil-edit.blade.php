@extends('layout.dashboardLayout')

@section('judul', 'EditMobil | DashboardAdmin')

@section('content')
<div class="container">
  <div class="wrapper">
      <center>
        <h1 style="font-family: 'Montserrat', sans-serif;">Edit Mobil</h1>
      </center>
  <form action="/mobil-update/{{$mobil->id}}" method="post" enctype="multipart/form-data" class="form-mobil">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_mobil" class="form-label">Nama Mobil</label>
        <input type="text" name="nama_mobil" class="form-control" id="nama_mobil" value="{{ $mobil->nama_mobil }}" required>
    </div>
    <div class="mb-3">
        <label for="plat_nomor" class="form-label">Plat Nomor</label>
        <input type="text" name="plat_nomor" class="form-control" id="plat_nomor" value="{{ $mobil->plat_nomor }}" required>
    </div>
    <div class="mb-3">
        <label for="warna" class="form-label">Warna</label>
        <input type="text" name="warna" class="form-control" id="warna" value="{{ $mobil->warna }}" required>
    </div>
    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control" id="gambar">
        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" class="form-control" id="status" required>
            <option value="Ada" {{ $mobil->status == 'Ada' ? 'selected' : '' }}>Ada</option>
            <option value="Sedang Dipakai" {{ $mobil->status == 'Sedang Dipakai' ? 'selected' : '' }}>Sedang Dipakai</option>
        </select>
    </div>
    <div class="tombol">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="/mobil" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
  </div>
</div>
@endsection

<style>
  .container {
    margin: 0 auto;
    padding: 20px;
    max-width: 800px;
  }

  .wrapper {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .form-mobil {
    display: flex;
    flex-direction: column;
  }

  .form-mobil .mb-3 {
    margin-bottom: 15px;
  }

  .form-label {
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-control {
    border-radius: 4px;
    border: 1px solid #ced4da;
    padding: 10px;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
  }
  .btn-secondary {
    background-color: #ff0000;
    border-color: #ff0000;
    color: #fff;
    padding: 12px 20px;
    border-radius: 4px;
    font-size: 16px;
  }
  .btn-secondary:hover {
    background-color: #b30000;
    border-color: #850000;
  }
  .tombol{
    display: flex;
    justify-content: space-between;
  }
</style>
