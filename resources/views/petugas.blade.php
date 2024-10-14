@extends('layout.dashboardLayout')

@section('judul', 'DataPetugas | DashboardAdmin')

@section('content')
    <center>
        <h1 style="font-family: 'Montserrat', sans-serif; padding-top:1rem; margin-bottom :3rem;">Tabel Petugas</h1>
    </center>
    <div class="box-wrap">
        <div class="mb-5">
            <a href="/petugas-add" class="button" role="button" aria-pressed="true">Tambah Petugas</a>
        </div>
        <div class="table-wrap">
            <table >
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$data->username}}</td>
                    <td>{{$data->nip}}</td>
                    <td>{{$data->nama_lengkap}}</td>
                    <td>{{$data->no_telepon}}</td>

                    <td>
                        <div class="aksi" style="display: flex; justify-content: center; align-items: center  ; gap: 10px;">
                            <a href="/petugas-edit/{{$data->id}}" style="text-align: center; color: white;width: 35px; height: 35px; padding:9px 8px 10px 10px; ; background-color:#0072ff; border-radius: 6px;"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/petugas-delete/{{$data->id}}" onclick="return confirm('Are you sure?')" style="text-align: center; color: white;width: 35px; height: 35px; padding:9px 8px 9px 8px; ; background-color:#ff0058; border-radius: 6px;"><i class="fa-solid fa-trash"></i></a>
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