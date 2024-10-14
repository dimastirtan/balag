@extends('layout.dashboardLayout')

@section('judul', 'EditBuku | DashboardAdmin')

@section('content')
<div class="container">
  <div class="wrapper">
    <center>
      <h1 style="font-family: 'Montserrat', sans-serif;">Edit Pengguna</h1>
    </center>
    <form action="/user-update/{{$user->id}}" method="post" class="form-user">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Ganti Password">
      </div>
      <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="number" name="nip" class="form-control" id="nip" value="{{ $user->nip }}" required>
      </div>
      <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ $user->nama_lengkap }}" required>
      </div>
      <div class="mb-3">
        <label for="no_telepon" class="form-label">No Telepon</label>
        <input type="number" name="no_telepon" class="form-control" id="no_telepon" value="{{ $user->no_telepon }}" required>
      </div>
      <div class="tombol">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/user" class="btn btn-secondary">Kembali</a>
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

  .form-user {
    display: flex;
    flex-direction: column;
  }

  .form-user .mb-3 {
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
    font-size: 16px;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.2s, border-color 0.2s;
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
