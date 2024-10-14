@extends('layout.dashboardLayout')

@section('judul', 'TambahKaryawan | DashboardAdmin')

@section('content')
<div class="container">
  <div class="wrapper">
    <center>
        <h1 style="font-family: 'Montserrat', sans-serif;">Tabel Karyawan</h1>
    </center>
    <form action="petugas-save" method="post" class="form-pengguna">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" name="nip" class="form-control" id="nip" >
        </div>
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" >
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="number" name="no_telepon" class="form-control" id="no_telepon" >
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" id="role" class="form-select" required>
              <option value="" disabled selected>Pilih Role</option>
              <option value="admin">Admin</option>
              <option value="petugas">Petugas</option>
          </select>
      </div>
      
        <div class="tombol">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="/petugas" class="btn btn-secondary">Kembali</a>
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

  .form-pengguna {
    display: flex;
    flex-direction: column;
  }

  .form-pengguna .mb-3 {
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
  .form-select {
    border-radius: 0.25rem; /* Custom border radius */
    border: 1px solid #ced4da; /* Custom border color */
}

.form-select:focus {
    border-color: #80bdff; /* Focus border color */
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Focus shadow */
}
</style>
