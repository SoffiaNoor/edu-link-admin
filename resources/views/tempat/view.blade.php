@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder">Detail Kelas Mata Kuliah:

                    </h5>
                    <hr style="background-color:#01353f;height:10px;border-radius:40px;width:25%">
                </div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    value="{{ $tempat->ruang->NamaRuang }}" name="IDRuang" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama MK</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    value="{{ $tempat->tempatMK->NamaMK }}" name="IDMK" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Mulai Mata Kuliah</label>
                                <input type="time" class="form-control" id="exampleFormControlInput1" name="jam_mulai"
                                    value="{{ $formatted_time_2 }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jam Selesai Mata Kuliah</label>
                                <input type="time" class="form-control" id="exampleFormControlInput1" name="jam_selesai"
                                    value="{{$formatted_time_1}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pt-2">
                            <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                <a href="/tempat" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i></a>
                                <a href="/tempat" class="btn-inner--text text-white ms-2">Kembali</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-primary" type="button">
                                <a href="{{route('tempat.edit',['IDRuang' => $tempat->IDRuang, 'IDMK' => $tempat->IDMK])}}"
                                    class="btn-inner--icon text-white"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></a>
                                <a href="{{route('tempat.edit',['IDRuang' => $tempat->IDRuang, 'IDMK' => $tempat->IDMK])}}"
                                    class="btn-inner--text text-white ms-2">Edit</a>
                            </button>
                            <button class="btn btn-icon btn-3 btn-danger" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <a class="btn-inner--icon text-white"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a class="btn-inner--text text-white ms-2">Hapus</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bolder" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-sm">
                Apakah anda yakin menghapus Kelas untuk Mata Kuliah <span
                    class="font-weight-bolder">{{$tempat->ruang->NamaRuang}}</span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <form
                    action="{{ route('tempat.destroy', ['IDRuang' => $tempat->IDRuang, 'IDMK' => $tempat->IDMK]) }}"
                    method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')

@endsection