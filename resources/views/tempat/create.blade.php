@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder">Tambah Kelas Mata Kuliah:

                    </h5>
                    <hr style="background-color:#01353f;height:10px;border-radius:40px;width:25%">
                </div>
                @if(session('error'))
    <div class="alert alert-danger m-2" style="color:white;font-weight:bold">
        {{ session('error') }}
    </div>
@endif
                <form class="p-3" method="POST" action="{{ route('tempat.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ruang</label>
                                <select class="form-select" name="IDRuang">
                                    @foreach ($ruang as $item)
                                    <option value="{{ $item->IDRuang }}" @if ($item->IDRuang == old('IDRuang',
                                        $model1->IDRuang))
                                        selected
                                        @endif
                                        >{{ $item->NamaRuang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mata Kuliah</label>
                                <select class="form-select" name="IDMK">
                                    @foreach ($mataKuliah as $item)
                                    <option value="{{ $item->IDMK }}" @if ($item->IDMK == old('IDMK', $model2->IDMK))
                                        selected
                                        @endif
                                        >{{ $item->NamaMK }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai Mata Kuliah</label>
                                <input type="time" class="form-control" id="exampleFormControlInput1" name="jam_mulai"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Selesai Mata Kuliah</label>
                                <input type="time" class="form-control" id="exampleFormControlInput1" name="jam_selesai"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/tempat" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i>
                                </a>
                                <a href="/tempat" class="btn-inner--text text-white ms-2">Kembali</a>
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