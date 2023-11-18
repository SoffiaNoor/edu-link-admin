@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder">Tambah Mahasiswa:

                    </h5>
                    <hr style="background-color:#01353f;height:10px;border-radius:40px;width:25%">
                </div>
                @if(session('error'))
                    <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="p-3" method="POST" action="{{ route('mahasiswa.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6" style="align-self:end!important;">
                            <div class="form-group">
                                <label>NRP</label>
                                <input type="text" class="form-control" id="NRP" name="NRP" required>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                                @if ($errors->has('IPK'))
                                <div class="alert alert-danger text-white font-weight-bold p-2 text-sm">
                                    {{ $errors->first('IPK') }}
                                </div>
                                @endif
                            <div class="form-group">
                                <label>IPK <span style="font-style:italic;color:red">*Contoh : 3.0 (Menggunakan titik)</span></label>
                                <input type="text" class="form-control" id="IPK" name="IPK" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="NamaMhs" name="NamaMhs" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="Alamat" name="Alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dosen Wali</label>
                                <select class="form-select" name="IDDosen">
                                    @foreach ($dosen as $item)
                                    <option value="{{ $item->IDDosen }}" @if ($item->IDDosen == old('IDDosen',
                                        $model2->IDDosen))
                                        selected
                                        @endif
                                        >{{ $item->IDDosen }} <span> - </span> {{$item->NamaDosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-select" id="JenisKelamin" name="JenisKelamin">
                                    <option value="Perempuan">Perempuan
                                    </option>
                                    <option value="Laki-laki">Laki-Laki
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/mahasiswa" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>
                                </a>
                                <a href="/mahasiswa" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-success" type="submit">
                                <a class="btn-inner--icon text-white"><i class="fa fa-save" aria-hidden="true"></i>
                                </a>
                                <a class="btn-inner--text text-white ms-2">Simpan</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
</div>
@endsection

@section('jquery')

@endsection