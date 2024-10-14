@extends('layout.navlayout')

@section('judul', 'PDAM TIRTA RAHARJA')

@section('content')

    <section class="detail">
        <div class="container flex">
            <div class="left">
                <div class="main_image">
                  <img src="{{asset('img/'.$detail->gambar)}}" class="slide">
                </div>
            </div>
            <div class="right">
                <h3>{{ $detail->nama_mobil }}</h3>
                <div class="keterangan">
                    <p><b>Plat Nomor : </b>{{ $detail->plat_nomor }}</p>
                    <p><b>Warna : </b>{{ $detail->warna }}</p>
                    <p><b>Status : </b>{{ $detail->status }}</p>
                </div>
                <div style="padding-top: 2rem; font-size: 1rem;" class="container-form">
                    <form style="width: 13rem;" action="/pinjam-mobil/{{ $detail->id }}" method="get">
                        @if ($detail->status === 'Sedang Dipakai')
                            <div><b>Maaf Mobil Sedang Digunakan Tolong Pilih Mobil Lain</b></div>
                        @else
                            <button class="button">Pinjam Mobil</button>
                        @endif
                    </form>
                </div>                            
            </div>
        </div>
    </section>
    <style>
        .detail {
            margin: 60px 0px 50px 50px;
        }

        .container {
            padding-top: 3.5rem;
            background: white;
        }

        .left,
        .right {
            padding: 60px;
        }

        .left {
            width: 45%;
        }

        .flex {
            display: flex;
            /* justify-content: space-between; */
            justify-content: center;
        }

        .flex1 {
            display: flex;
        }

        .main_image {
            width: auto;
            height: auto;
        }

        .main_image img {
            width: 100%;

        }

        .option img {
            width: 75px;
            height: 75px;
            padding: 10px;
        }

        .right {
            padding: 30px 100px 50px 50px;
            width: 50rem;
        }

        h3 {
            color: #000000;
            margin: 20px 0 20px 0;
            font-size: 25px;
        }

        p {
            margin: 20px 0 50px 0;
            line-height: 25px;
            font-size: 2rem;
        }

        .right p {
            margin: 0px 0 20px 0;
            line-height: 25px;
        }

        .keterangan {
            margin-top: 50px;
        }

        h5 {
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #368cce;
            color: white;
            margin-top: 5rem;
            margin-left: 16rem;
            border-radius: 6px;
        }

        .button:hover {
            background: #2672ab;
        }

        @media only screen and (max-width:768px) {
            .container {
                max-width: 90%;
                margin: auto;
                height: auto;
            }

            .left,
            .right {
                width: 100%;
            }

            .container {
                flex-direction: column;
            }
        }

        @media only screen and (max-width:511px) {
            .container {
                max-width: 100%;
                height: auto;
                padding: 10px;
            }

            .left,
            .right {
                padding: 0;
            }

            img {
                width: 100%;
                height: 100%;
            }

            .option {
                display: flex;
                flex-wrap: wrap;
            }
        }
    </style>
@endsection
