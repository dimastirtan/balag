@extends('layout.dashboardLayout')

@section('judul', 'DataPeminjaman | DashboardAdmin')

@section('content')
    <center>
        <h1 style="font-family: 'Montserrat', sans-serif; padding-top:1rem; margin-bottom :3rem;">Tabel Peminjaman</h1>
    </center>
    <div class="box-wrap">
        <div class="mb-5">
            {{-- <a href="/user-add" class="button" role="button" aria-pressed="true">Tambah Peminjaman</a> --}}
        </div>
        <div class="table-wrap">
            <table >
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Mobil</th>
                    <th>Plat Mobil</th>
                    <th>Tujuan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->users->nama_lengkap}}</td>
                    <td>{{$data->mobils->nama_mobil}}</td>
                    <td>{{$data->mobils->plat_nomor}}</td>
                    <td>{{$data->tujuan}}</td>
                    <td>{{$data->tanggal_peminjaman}}</td>
                    <td>{{$data->tanggal_pengembalian}}</td>

                    <td>
                        <div class="aksi" style="display: flex; justify-content: center; align-items: center  ; gap: 10px;">
                            <a href="/user-edit/{{$data->id}}" style="text-align: center; color: white;width: 35px; height: 35px; padding:9px 8px 10px 10px; ; background-color:#0072ff; border-radius: 6px;"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/user-delete/{{$data->id}}" onclick="return confirm('Are you sure?')" style="text-align: center; color: white;width: 35px; height: 35px; padding:9px 8px 9px 8px; ; background-color:#ff0058; border-radius: 6px;"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>  
    </div>
<style>
a.button{
    width: auto;
    height: auto;
    padding: 15px 15px 15px 15px;
    background-color: #1411ac;
    border-radius:6px; 
    text-decoration: none; 
    color: white;
    margin-left: 3rem;
}
</style>
@endsection