@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="px-3">Ambil Kuliah
                        </h3>
                        <hr class="ms-3 mt-0" style="background-color:#01353f;height:10px;border-radius:40px;width:50%">
                    </div>
                    <div class="col-sm-6"> <a class="btn btn-warning" href="{{route('ambil_kuliah.create')}}"
                            style="float:right;">
                            <span>Tambah Data</span>
                            <i class="fa fa-plus ms-2"></i>
                        </a>
                    </div>
                </div>
                @if (count($ambilKuliah) > 0)
                <div class="table-responsive">
                    @if (count($errors) > 0)
                    <div
                        class="alert alert-danger shadow border-radius-xl p-2 border-none text-white font-weight-bolder flex flex-col ">
                        <strong>Sorry ! There were some problems with your input.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success shadow border-radius-xl text-white font-weight-bolder">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">No.</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Mahasiswa</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">Mata Kuliah</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">Nilai Angka</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">Nilai Huruf</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ambilKuliah as $AK)
                            <tr>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ ($ambilKuliah->currentPage() - 1) * $ambilKuliah->perPage() + $loop->iteration }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ $AK->mahasiswa->NamaMhs }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3 text-xs">
                                            {{ $AK->mataKuliah->NamaMK }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ $AK->NilaiAngka }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ $AK->NilaiHuruf }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    @if ($AK->NilaiHuruf == 'A' || $AK->NilaiHuruf == 'B' || $AK->NilaiHuruf == 'AB' || $AK->NilaiHuruf == 'C')
                                        <span class="badge bg-gradient-success w-60 me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-xs">Lulus</span>
                                        </span>
                                    @else
                                        <span class="badge bg-gradient-danger w-60 me-4">
                                            <i class="bg-info"></i>
                                            <span class="text-xs">Mengulang</span>
                                        </span>
                                    @endif
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="{{ route('ambil_kuliah.show', ['NRP' => $AK->NRP, 'IDMK' => $AK->IDMK]) }}"
                                        class="text-gray-400 hover:text-amber-400  mr-2">
                                        <i class="fa fa-eye text-sm"></i>
                                    </a>
                                    <a href="{{ route('ambil_kuliah.edit', ['NRP' => $AK->NRP, 'IDMK' => $AK->IDMK]) }}"
                                        class="text-gray-400 hover:text-amber-400 mx-2">
                                        <i class="fas fa-edit text-sm"></i>
                                        <a href="#" class="text-gray-400 hover:text-amber-400" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $AK->NRP }}-{{ $AK->IDMK }}">
                                            <i class="fa fa-trash text-sm"></i>
                                        </a>

                                        <div class="modal fade" id="deleteModal{{ $AK->NRP }}-{{ $AK->IDMK }}"
                                            tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bolder"
                                                            id="deleteModalLabel">
                                                            Delete Confirmation
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-sm">
                                                        Apakah anda yakin menghapus Ambil Kuliah Mahasiswa <span
                                                            class="font-weight-bolder">{{$AK->mahasiswa->NamaMhs}}</span>
                                                    </div>
                                                    <div class="modal-body text-sm" style="margin-top:-2rem">
                                                        pada mata kuliah <span
                                                            class="font-weight-bolder">{{$AK->mataKuliah->NamaMK}}</span>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tidak</button>
                                                        <form
                                                            action="{{ route('ambil_kuliah.destroy', ['NRP' => $AK->NRP, 'IDMK' => $AK->IDMK]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end pt-4">
                            @if ($ambilKuliah->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $ambilKuliah->previousPageUrl() }}" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:;" tabindex="-1">
                                    <i class="fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            @endif

                            @for ($i = 1; $i <= $ambilKuliah->lastPage(); $i++)
                                <li class="page-item {{ $i == $ambilKuliah->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $ambilKuliah->url($i) }}"
                                        style="{{ $i == $ambilKuliah->currentPage() ? 'color:white;background-color:#1B3C5F;border:none' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($ambilKuliah->currentPage() < $ambilKuliah->lastPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $ambilKuliah->nextPageUrl() }}">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    @endif
                        </ul>
                    </nav>
                </div>
                @else
                <div class="alert alert-info shadow border-radius-xl text-white font-weight-bolder">
                    Tabel masih kosong.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection

@section('jquery')

@endsection