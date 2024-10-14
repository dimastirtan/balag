@extends('layout.navlayout')

@section('judul', 'PDAM TIRTA RAHARJA')

@section('content')
    <section class="shop" id="shop">
        <div class="heading">
            <h1>Kami Menyediakan Berbagai Mobil</h1>
        </div>
        {{-- <form action="/search" method="GET">
            <div class="form-group">
                <label for="kategori_id" class="form-label">Kategori</label>
                <div>
                    @foreach ($kategori as $kat)
                        <label>
                            <input type="checkbox" name="kategori_id[]" value="{{ $kat->id }}">
                            {{ $kat->namakategori }}
                        </label>
                        <br>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form> --}}

        @if (isset($mobils))
            <div class="shop-container">
                @foreach ($mobils as $data)
                    <div class="box">
                        <div class="box-img">
                            <img src="{{ asset('img/' . $data->gambar) }}" alt="">
                        </div>
                        <h2>{{ $data->nama_mobil }}</h2>
                        {{ $data->plat_nomor }}
                        <a href="/detail-mobil/{{ $data->id }}" class="btn">Pinjam</a>

                    </div>
                @endforeach
            </div>
        @endif
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        document.getElementById('kategori_id_select').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
    <script>
        let menu = document.querySelector('#menu-icon');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () => {
            menu.classList.toggle('bx-x');
            navbar.classList.toggle('active');
        }
        window.onscroll = () => {
            menu.classList.remove('bx-x');
            navbar.classList.remove('active');
        }
    </script>
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-padding-top: 2rem;
            text-decoration: none;
            list-style: none;
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }
        section {
            padding: 90px 10%;
            background-color: #fff;

        }

        *::selection {
            color: #fff;
            background: var(--main-color);
        }

        img {
            width: 100%;
        }

        header {
            position: fixed;
            width: 100%;
            top: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            box-shadow: 0 4px 41px rgb(14 55 54 / 14%);
            padding: 15px 10%;
            transition: 0.2s;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 40px;
        }

        .navbar {
            display: flex;
        }

        .navbar a {
            font-size: 1rem;
            padding: 11px 20px;
            color: var(--second-color);
            font-weight: 600;
            text-transform: uppercase;
        }

        .navbar a:hover {
            color: var(--main-color);
        }

        .btn {
            padding: 7px 16px;
            border: 2px solid var(--second-color);
            border-radius: 40px;
            color: var(--second-color);
            font-weight: 500;
        }

        .btn:hover {
            color: #fff;
            background: var(--second-color);
        }

        .heading {
            text-align: center;
            text-transform: uppercase;
        }

        .heading span {
            font-size: 1rem;
            font-weight: 600;
            color: var(--second-color);
        }

        .heading h1 {
            font-size: 2rem;
            color: var(--main-color);
        }

        .shop-container {
            display: grid;
            /* flex-wrap: wrap;
        flex-direction: column;
        gap: 2.5rem; */
            margin-top: 5%;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            /* grid-template-rows: 200px 200px; */
            grid-gap: 1.5em;
        }

        .shop-container .box {
            flex: 1 1 10rem;
            background: var(--main-color);
            padding: 20px;
            display: flex;
            text-align: center;
            flex-direction: column;
            align-items: center;
            background-color: #EDEDED;
            margin-top: 10rem;
            border-radius: 0.5rem;
        }

        .shop-container .box .box-img {
            width: 150px;
            height: 150px;
            margin-top: -100px;
        }

        .shop-container .box .box-img img {
            width: 100%;
            height: 100%;
            scale: 1.5;
            object-fit: contain;
            object-position: center;
        }

        .stars {
            margin: 1rem 0 0.1rem;
        }

        .shop-container .box .stars .bx {
            color: #ebdbc8;
        }

        .shop-container .box h2 {
            color: black;
            font-size: 1.2rem;
        }

        .shop-container .box spam {
            color: #ebdbc8;
            font-size: 1.2rem;
            font-weight: 500;
            margin: 0.2rem 0 0.5rem;
        }

        .box .btn {
            border: 2px solid #2a7cbb;
            background: #368cce  ;
            margin-top: 5px;
        }

        .box .btn:hover {
            background: #2a7cbb;
            color: var(--second-color);
        }

        #menu-icon {
            font-size: 24px;
            cursor: pointer;
            z-index: 1001;
            display: none;
        }

        @media (max-width: 1150px) {
            header {
                padding: 18px 7%;
            }

            section {
                padding: 50px 7%;
            }

            .home-text h1 {
                font-size: 3rem;
            }

            .home-text h2 {
                font-size: 1.5rem;
            }
        }

        @media(max-width: 991px) {
            header {
                padding: 18px 4%;
            }

            section {
                padding: 50px 4%;
            }
        }

        @media(max-width: 768px) {
            header {
                padding: 11px 4%;
            }

            #menu-icon {
                display: initial;
            }

            header .navbar {
                position: absolute;
                top: -500px;
                left: 0;
                right: 0;
                display: flex;
                flex-direction: column;
                background: #fff;
                box-shadow: 0 4px 4px rgb(14 55 54 / 14%);
                border-top: 2px solid var(--main-color);
                transition: 0.2s;
                text-align: left;
            }

            .navbar.active {
                top: 63px;
            }

            .navbar a {
                padding: 1.5rem;
                display: block;
                color: var(--second-color);
            }

            .home-text span {
                font-size: 0.9rem;
            }

            .home-text h1 {
                font-size: 2.4rem;
            }

            .home-text h2 {
                font-size: 1.2rem;
            }
        }

        @media(max-width: 768px) {
            .home-text {
                padding-top: inherit;
            }

            .shop-container .box {
                margin-top: 6rem;
            }

            .heading h1 {
                font-size: 1.5rem;
            }

            .heading span {
                font-size: 0.9rem;
            }

            .about {
                flex-direction: column-reverse;
            }

        }

        @media(max-width: 364px) {
            .links {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
@endsection
