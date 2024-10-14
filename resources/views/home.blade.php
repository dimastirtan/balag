@extends('layout.navlayout')

@section('judul', 'PDAM TIRTA RAHARJA')

@section('content')

    <section class="home" id="home">
        <h1 class="display-1 fw-bold" data-speed="-2">PEMINJAMAN MOBIL</h1>
        <img class="img-fluid" data-speed="5" src="<?php echo url('/'); ?>/img/car0.png" alt="">
    </section>
    <!-- home section end -->

    <section class="container">
        <h1 class="position-relative py-2 px-4 text-bg-primary border border-primary text-center" style="border-radius:15px;">Pilih Hari Peminjaman</h1>
        <form action="" method="GET">
            @csrf
            <div class="col">
                <button type="submit" name="tanggal_pinjam" value="Senin" class="btn btn-secondary p-3 ms-3">Senin</button>
                <button type="submit" name="tanggal_pinjam" value="Selasa" class="btn btn-secondary p-3">Selasa</button>
                <button type="submit" name="tanggal_pinjam" value="Rabu" class="btn btn-secondary p-3">Rabu</button>
                <button type="submit" name="tanggal_pinjam" value="Kamis" class="btn btn-secondary p-3">Kamis</button>
                <button type="submit" name="tanggal_pinjam" value="Jumat" class="btn btn-secondary p-3">Jumat</button>
            </div>
        </form>
    </section>

    <section class="container" id="featured">
        <h1 class="position-relative py-2 px-4 text-bg-primary border border-primary text-center" style="border-radius:15px;"> Mobil Tersedia </h1>
        <div class="row">
            @foreach ($mobils as $data)
            <div class="col-md-3 mb-3 py-3">
                <div class="card p-3">
                    <img src="{{ asset('img/' . $data->gambar) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h2 class="card-title">{{ $data->nama_mobil }}</h2>
                        <h3 class="card-text">{{ $data->plat_nomor }}</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Pinjam
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection