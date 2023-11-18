@extends('layouts.master')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-lg-12 mb-lg-0 mb-4 shadow-xl">
            <div class="card p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="px-3">Audit Mata Kuliah
                        </h3>
                        <hr class="ms-3 mt-0" style="background-color:#01353f;height:10px;border-radius:40px;width:50%">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">ID</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder">IDMK</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">SKS Baru</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">SKS Lama</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">Nama MK Baru
                                </th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">Nama MK Old</th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">
                                    <a href="{{ route('audit.showAudit', ['sort' => 'date', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                                        Date
                                        @if($sortBy === 'date')
                                            <i class="fa fa-sort-{{ $order === 'asc' ? 'asc' : 'desc' }} text-lg ms-2"></i>
                                        @endif
                                    </a>
                                </th>
                                <th class="text-uppercase text-default text-xs font-weight-bolder ps-2">User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audit as $a)
                            <tr>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ ($audit->currentPage() - 1) * $audit->perPage() + $loop->iteration }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-2 text-xs">
                                            {{ $a->IDMK }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ $a->SKS_New }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            <?php
                                            if (!empty($a->SKS_Old)) {
                                                echo $a->SKS_Old;
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ $a->NamaMK_New }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ $a->NamaMK_Old }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            <?php
                                            // Assuming $a->Date contains the date you want to format
                                            $date = date('l, j F Y', strtotime($a->Date));
                                            echo $date;
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-uppercase text-default text-xs font-weight-bolder">
                                    <div class="d-flex align-items-center">
                                        <span class="text-xs">
                                            {{ $a->users }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end pt-4">
                            @if ($audit->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $audit->previousPageUrl() }}" tabindex="-1">
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

                            @for ($i = 1; $i <= $audit->lastPage(); $i++)
                                <li class="page-item {{ $i == $audit->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $audit->url($i) }}"
                                        style="{{ $i == $audit->currentPage() ? 'color:white;background-color:#1B3C5F;border:none' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($audit->currentPage() < $audit->lastPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $audit->nextPageUrl() }}">
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

            </div>


            @endsection

            @section('jquery')
            <script>
                $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var dataId = button.data('dataid');
        var form = $('#deleteForm');
        var action = form.attr('action');
        action = action.replace('data_id', dataId);
        form.attr('action', action);
    });
            </script>

            @endsection