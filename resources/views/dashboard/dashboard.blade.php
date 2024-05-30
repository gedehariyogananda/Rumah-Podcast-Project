@extends('layout.master_main')
@section('name_fitur', 'Dashboard Panel')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <div class="modal fade" id="simpan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="simpan">notifikasi</h5>
                    </div>
                    <div class="modal-body">
                        apakah anda yakin ingin keluar dari akun
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tidak</button>
                        <a href="/logout" class="btn btn-primary">iyaa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-10 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">RumahPodcast</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('storage/logo/logooo.jpeg') }}" alt="...">
                    </div>
                    <p></p>
                    {{-- <a target="_blank" rel="nofollow" href="{{ route('getAllPodcasts') }}">lihat podcast lainnya
                        &rarr;</a> --}}
                    <a href="{{ route('getAllPodcasts') }}"> Lihat Podcast Lainnya ... </a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recomendasi Podcast </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{ route('getAllPodcasts') }}"><img
                                        src="https://i.pinimg.com/564x/fb/2c/02/fb2c024fc9fbd4680690ae21b77d2a0a.jpg"
                                        class="card-img-top" style="width:30%;height:20%; "></a>
                                <div class="card-body">
                                    <h4>Genre:Horor</h4>
                                    <p>Kisah ini Aisyah alami bermula ketika dirinya melakukan
                                        perjalanan pulang kampung dari Bekasi ke Lampung untuk mengambil
                                        ijazah miliknya.

                                        Pada awal perjalanannya ke Lampung semua lancar aja, hingga
                                        beberapa hari setelahnya dirinya mengalami suatu kejadian diluar
                                        nalar ketika melakukan perjalanan balik.</p>
                                    <a href="{{ route('getAllPodcasts') }}"> Lihat Podcast Lainnya ... </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{ route('getAllPodcasts') }}"><img
                                        src="https://i.pinimg.com/564x/fb/2c/02/fb2c024fc9fbd4680690ae21b77d2a0a.jpg"
                                        class="card-img-top"
                                        style="width:30%;height:20%;justify-content: center; align-items: center;  "></a>
                                <div class="card-body">
                                    <h4>Genre:Inspirasi</h4>
                                    <p>Dalam berproses menjadi sukses, membaca sangat penting. Selain
                                        itu, terdapat beberapa hal yang perlu dihilangkan jika kita
                                        ingin sukses. Yuk simak podcast kali ini, saya akan membagikan
                                        tips-tips agar kita menjadi sukses
                                    </p>
                                    <a href="{{ route('getAllPodcasts') }}"> Lihat Podcast Lainnya ... </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <a href="{{ route('getAllPodcasts') }}"><img
                                        src="https://i.pinimg.com/564x/fb/2c/02/fb2c024fc9fbd4680690ae21b77d2a0a.jpg"
                                        class="card-img-top" style="width:30%;height:20%; "></a>
                                <div class="card-body">
                                    <h4>Genre:Komedi</h4>
                                    <p>Di obrolan kali ini Coki dan Muslim bercerita mengenai perjalanan
                                        pertamakali pertemuan mereka, awal mula mengeluarkan jokes-jokes
                                        yang diluar nurul manusia (dark jokes), hubungan nya yang
                                        renggang dengan habib ja’far, anaknya muslim yang akan di
                                        ajarkan membuat kendi oleh coki, rumah tretan muslim dikirimin
                                        hal-hal gaib, dan masih banyak lagi cerita seru lainnya..
                                        Penasaran kann ??? Yuk simak podcast kali ini</p>
                                    <a href="{{ route('getAllPodcasts') }}"> Lihat Podcast Lainnya ... </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection