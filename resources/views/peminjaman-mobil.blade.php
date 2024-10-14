@extends('layout.navlayout')

@section('judul', 'DataPeminjaman | DashboardAdmin')

@section('content')
    <center>
        <h1 style="font-family: 'Montserrat', sans-serif; padding-top:1rem; margin-bottom:3rem;">Tabel Peminjaman</h1>
    </center>
    <div class="box-wrap">
        <div class="mb-5">
        </div>
        <div class="table-wrap">
            <div class="mb-5 search-container">
                <form method="GET" action="{{ url()->current() }}" id="searchForm">
                    <input type="text" name="search" placeholder="Cari Nama Peminjam Atau Plat Mobil"
                        value="{{ request()->input('search') }}" class="search-input" oninput="checkInput()">
                    <button type="submit" class="btn-search">Search</button>
                </form>
            </div>
            
            <script>
                function checkInput() {
                    const searchInput = document.querySelector('.search-input');
                    
                    // If input is empty, submit the form to refresh
                    if (searchInput.value.trim() === '') {
                        document.getElementById('searchForm').submit();
                    }
                }
            </script>            
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Mobil</th>
                        <th>Plat Mobil</th>
                        <th>Tujuan</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Mobil</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->users->nama_lengkap }}</td>
                            <td>{{ $data->mobils->nama_mobil }}</td>
                            <td>{{ $data->mobils->plat_nomor }}</td>
                            <td>{{ $data->tujuan }}</td>
                            <td>{{ $data->tanggal_peminjaman }}</td>
                            <td>{{ $data->tanggal_pengembalian }}</td>
                            <td>{{ $data->mobils->status }}</td>
                            <td>
                                <div class="aksi" style="display: flex; justify-content: center; align-items: center; gap: 10px;">
                                    <form method="POST" action="{{ route('pengembalian.update', $data->id) }}">
                                        @csrf
                                        @method('PATCH') <!-- Use PATCH method to update -->
                                        <button type="submit" class="btn" onclick="return confirm('Confirm return of the vehicle?')">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                </div>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .search-input {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 332px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #0072ff;
            box-shadow: 0 0 5px rgba(0, 114, 255, 0.5);
        }

        .btn-search {
            padding: 10px 20px;
            margin-left: 10px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-search:hover {
            background-color: #005bb5;
        }

        .btn-search {
            padding: 8px 16px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-search:hover {
            background-color: #005bb5;
        }

        .table-wrap {

            width: 100%;
            height: 100%;
            padding: 10rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        th {
            background-color: #0072ff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .aksi {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn {
            text-align: center;
            color: white;
            width: 35px;
            height: 35px;
            padding: 5px 10px 10px 10px;
            background-color: #3cb408d8;
            border-radius: 6px;

        }

        .btn:hover {
            background-color: #216803;
        }
    </style>
@endsection
