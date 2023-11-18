@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
            <div class="row">
                <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
                    <div class="card p-2">
                        <div class="px-3 pt-2 font-weight-bold">
                            <h5 class="font-weight-bolder">Edit Dosen:
    
                            </h5>
                            <hr style="background-color:#01353f;height:10px;border-radius:40px;width:25%">
                        </div>
                        <form class="p-3" method="POST" action="{{ route('dosen.update',$Dosen->IDDosen)}}" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT') 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IDDosen</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            value="{{$Dosen->IDDosen}}" disabled name="IDDosen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Dosen</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            value="{{$Dosen->NamaDosen}}" name="NamaDosen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            value="{{$Dosen->Alamat}}" name="Alamat">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 pt-2">
                                    <button class="btn btn-icon btn-3 btn-secondary" type="button">
                                        <a href="/dosen" class="btn-inner--icon text-white"><i
                                                class="fa fa-arrow-left" aria-hidden="true"></i>
                                        </a>
                                        <a href="/dosen" class="btn-inner--text text-white ms-2">Kembali</a>
                                    </button>
                                    <button class="btn btn-icon btn-3 btn-success" type="submit">
                                        <a class="btn-inner--icon text-white"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn-inner--text text-white ms-2">Update</a>
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