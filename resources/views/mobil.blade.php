@extends('layout.dashboardLayout')

@section('judul', 'DataMobil | DashboardAdmin')

@section('content')
    <center>
        <h1 style="font-family: 'Montserrat', sans-serif; padding-top:1rem; margin-bottom :3rem;">Tabel Mobil</h1>

    </center>
    <div class="box-wrap">
        <div class="mb-3">
            <a href="/mobil-add" class="button" role="button" aria-pressed="true">Tambah Mobil</a>
        </div>
        <div class="table-wrap">
            <table >
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Warna</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mobil as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->nama_mobil}}</td>
                    <td>{{$data->plat_nomor}}</td>
                    <td>{{$data->warna}}</td>
                    <td><img src="{{asset('img/'.$data->gambar)}}" style="width: 10rem;"></td>
                    <td>{{$data->status}}</td>

                    <td>
                        <div class="aksi" style="display: flex; justify-content: center; align-items: center  ; gap: 10px;">
                            <a href="/mobil-edit/{{$data->id}}" style="text-align: center; color: white;width: 35px; height: 35px; padding:9px 8px 10px 10px; ; background-color:#0072ff; border-radius: 6px;"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="/mobil-delete/{{$data->id}}" onclick="return confirm('Are you sure?')" style="text-align: center; color: white;width: 35px; height: 35px; padding:9px 8px 9px 8px; ; background-color:#ff0058; border-radius: 6px;"><i class="fa-solid fa-trash"></i></a>
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