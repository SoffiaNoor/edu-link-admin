@extends('layouts.master')

@section('content')
<div class="container-fluid px-3 pt-1">
    @if($loggedInUser)
    <h4 class="text-white font-weight-bolder">Selamat Datang, {{ ucfirst($loggedInUser->name) }}</h4>
    @endif
    <div class="row">
        <div class="col-sm-4 mt-2" data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-in-sine">
            <div class="info-horizontal bg-gradient-danger border-radius-xl p-3">
                <div class="icon">
                    <i class="fa fa-book text-2xl text-white mt-1"></i>
                </div>
                <div class="description ps-5">
                    <h6 class="text-white font-weight-bolder">Jumlah Mahasiswa RUNGKAD</h6>
                    <h2 class="text-white"
                        style="background: linear-gradient(to right, #ffffffc9, #f1f8ff);-webkit-text-fill-color: transparent;-webkit-background-clip: text;">
                        {{ \App\Models\Mahasiswa::count() }}
                    </h2>
                    <hr class="m-0" style="background-color:#ffffff;height:10px;border-radius:40px;width:50%">
                    <a href="/mahasiswa" class="text-light icon-move-right font-weight-bolder"
                        style="font-style:italic">
                        Lihat lebih lanjut
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-2" data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-in-sine">
            <div class="info-horizontal bg-gradient-info border-radius-xl p-3">
                <div class="icon">
                    <i class="fa fa-book text-2xl text-white mt-1"></i>
                </div>
                <div class="description ps-5">
                    <h6 class="text-white font-weight-bolder">Jumlah Dosen RUNGKAD</h6>
                    <h2 class="text-white"
                        style="background: linear-gradient(to right, #ffffffc9, #f1f8ff);-webkit-text-fill-color: transparent;-webkit-background-clip: text;">
                        {{ \App\Models\Dosen::count() }}
                    </h2>
                    <hr class="m-0" style="background-color:#ffffff;height:10px;border-radius:40px;width:50%">
                    <a href="/dosen" class="text-light icon-move-right font-weight-bolder" style="font-style:italic">
                        Lihat lebih lanjut
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-2" data-aos="fade-up" data-aos-delay="300" data-aos-easing="ease-in-sine">
            <div class="info-horizontal bg-gradient-success border-radius-xl p-3">
                <div class="icon">
                    <i class="fa fa-book text-2xl text-white mt-1"></i>
                </div>
                <div class="description ps-5">
                    <h6 class="text-white font-weight-bolder">Jumlah Mata Kuliah RUNGKAD</h6>
                    <h2 class="text-white"
                        style="background: linear-gradient(to right, #ffffffc9, #f1f8ff);-webkit-text-fill-color: transparent;-webkit-background-clip: text;">
                        {{ \App\Models\MataKuliah::count() }}
                    </h2>
                    <hr class="m-0" style="background-color:#ffffff;height:10px;border-radius:40px;width:50%">
                    <a href="/dosen" class="text-light icon-move-right font-weight-bolder" style="font-style:italic">
                        Lihat lebih lanjut
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="600"
    data-aos-easing="ease-in-sine">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="3000">
            <div class="page-header min-vh-50 m-3 border-radius-xl"
                style="background-image: url('assets/images/carousel-1.jpg');">
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="page-header min-vh-50 m-3 border-radius-xl"
                style="background-image: url('assets/images/carousel-2.jpg');">
            </div>
        </div>
    </div>
    <div class="min-vh-50 position-absolute w-100 top-0">
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>

@endsection

@section('jquery')

@endsection