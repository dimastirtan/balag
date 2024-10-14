<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDAM TIRTA RAHARJA | Pinjam Mobil</title>
    <link rel="stylesheet" href="{{ url('/css/pinjam.css') }}">
</head>
<body>
    
    <div class="container">
        <form action="/peminjaman-mobil" method="post">
            @csrf
            <div class="checkoutLayout">    
                <div class="returnCart">
                    <h1>Detail Mobil</h1>
                    <div class="list">
                        <div class="item">
                            <img src="{{ asset('img/'.$mobil->gambar) }}" style="scale: 2; margin-left: 2rem;">   
                            <div class="info">
                                <div class="name">{{ $mobil->nama_mobil }}</div>
                                <div class="price"><b>Plat Nomor:</b> {{ $mobil->plat_nomor }}</div>
                                <div class="price"><b>Warna:</b> {{ $mobil->warna }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="right">
                    <div class="my-2" style="width: 75px;margin-left: 270px;scale: 0.7;">
                        <a href="/home" class="link">
                      <span class="mask">
                        <div class="link-container">
                          <span class="link-title1 title">Kembali</span>
                          <span class="link-title2 title">Kembali</span>
                        </div>
                      </span>
                        </a>
                        </div>
                    <h1>Peminjaman</h1>
                    
                    <div class="form">
                        <div class="group">
                            <label for="user">Nama Peminjam</label>
                            <select name="user_id" id="user" required>
                                <option value="" disabled selected>Pilih user</option>
                                @foreach ($user as $k)
                                    <option value="{{ $k->id }}">{{ $k->nip }}<b>-</b>{{ $k->nama_lengkap }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" required>
                        </div>
                        
                        <div class="group">
                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tanggal_peminjaman" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        
                        @php
                            $tanggal_peminjaman = \Carbon\Carbon::now();
                            @endphp
                    </div>
                    
                    <div class="group">
                        <input type="hidden" name="mobil_id" value="{{ $mobil->id }}"> <!-- Add hidden input for mobil_id -->
                    </div>
                    <button type="submit" class="buttonCheckout">Pinjam</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
