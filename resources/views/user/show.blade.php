@extends('layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="text-uppercase text-sm text-white font-weight-bolder bg-secondary p-3 rounded-start shadow"
                                    style="background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);border-radius:2rem">
                                    User
                                    Information</p>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-icon btn-3 btn-secondary" type="button" style="float:right">
                                    <a href="/user" class="btn-inner--icon text-white"><i class="fa fa-arrow-left"
                                            aria-hidden="true"></i></a>
                                    <a href="/user" class="btn-inner--text text-white ms-2">Kembali</a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input class="form-control" type="text" value="{{$users->name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" type="email" value="{{$users->email}}" readonly>
                            </div>
                        </div>
                    </div>
                    <p class="text-uppercase text-sm font-weight-bolder">Change Password</p>
                    <hr style="background-color:#01353f;height:10px;border-radius:40px;width:50%">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('user.changePassword', $users->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="current_password" class="form-control-label">Current Password</label>
                                    <input name="current_password" class="form-control" type="password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password" class="form-control-label">New Password</label>
                                    <input name="new_password" class="form-control" type="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit"
                                style="background: linear-gradient(45deg, #1b3c5fc9, #1B3C5F);width:100%">
                                <i class="fa fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jquery')

@endsection