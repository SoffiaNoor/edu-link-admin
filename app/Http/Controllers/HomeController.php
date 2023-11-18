<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        $mataKuliah = MataKuliah::all();
        $user = User::all();

        $loggedInUser = Auth::user();


        return view("home", compact('mahasiswa','dosen','mataKuliah','loggedInUser'));
    }

    public function login()
    {
        return view("login");
    }
}
