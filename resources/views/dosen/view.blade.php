@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-2">
                <div class="px-3 pt-2 font-weight-bold">
                    <h5 class="font-weight-bolder">Detail Dosen:</h5>
                    <hr style="background-color:#01353f;height:10px;border-radius:40px;width:25%">
                </div>
                <div class="ms-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>IDDosen</label>
                            <input type="text" class="form-control" value="{{$Dosen->IDDosen}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Dosen</label>
                            <input type="text" class="form-control" value="{{$Dosen->NamaDosen}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="{{$Dosen->Alamat}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 pt-2">
                        <button class="btn btn-icon btn-3 btn-secondary" type="button">
                            <a href="/dosen" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i></a>
                            <a href="/dosen" class="btn-inner--text text-white ms-2">Kembali</a>
                        </button>
                        <button class="btn btn-icon btn-3 btn-primary" type="button">
                            <a href="{{route('dosen.edit',$Dosen->IDDosen)}}"
                                class="btn-inner--icon text-white"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{route('dosen.edit',$Dosen->IDDosen)}}"
                                class="btn-inner--text text-white ms-2">Edit</a>
                        </button>
                        <button class="btn btn-icon btn-3 btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            <a class="btn-inner--icon text-white"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a class="btn-inner--text text-white ms-2">Hapus</a>
                        </button>
                    </div>
                </div>
            </div></div>
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
            <div class="modal-body">
                Apakah anda yakin menghapus Dosen <span class="font-weight-bolder">{{$Dosen->NamaDosen}}</span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <form action="{{ route('dosen.destroy', $Dosen->IDDosen) }}" method="POST"
                    style="display: inline;">
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