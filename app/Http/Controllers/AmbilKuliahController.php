<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmbilKuliah;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

use Illuminate\Support\Facades\DB;

class AmbilKuliahController extends Controller
{
    public function index()
    {
        $ambilKuliah = AmbilKuliah::paginate(5);
        $mahasiswa = Mahasiswa::all();
        $mataKuliah = MataKuliah::all();

        return view("ambil_kuliah.index", compact('ambilKuliah', 'mahasiswa', 'mataKuliah'));
    }
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $model1 = new Mahasiswa();
        $mataKuliah = MataKuliah::all();
        $model2 = new MataKuliah();

        return view("ambil_kuliah.create", compact('mahasiswa', 'model1', 'mataKuliah', 'model2'));
    }

    public function show(string $NRP, string $IDMK)
    {
        $ambilKuliah = AmbilKuliah::where('NRP', $NRP)
            ->where('IDMK', $IDMK)
            ->first();
        return view("ambil_kuliah.view", compact('ambilKuliah'));
    }

    public function edit($NRP, $IDMK)
    {
        $ambilKuliah = AmbilKuliah::where('NRP', $NRP)
            ->where('IDMK', $IDMK)
            ->first();

        if (!$ambilKuliah) {
            return redirect()->route('ambil_kuliah.index')->with('error', 'Ambil kuliah tidak ditemukan!');
        }

        return view("ambil_kuliah.update", compact('ambilKuliah'));
    }

    public function destroy(string $NRP, string $IDMK)
    {
        $ambilKuliah = DB::table('AmbilKuliah')
            ->where('NRP', $NRP)
            ->where('IDMK', $IDMK)
            ->first();

        if (!$ambilKuliah) {
            return redirect()->route('ambil_kuliah.index')->with('error', 'Ambil kuliah tidak ditemukan!');
        }

        DB::table('AmbilKuliah')
            ->where('NRP', $NRP)
            ->where('IDMK', $IDMK)
            ->delete();

        return redirect()->route('ambil_kuliah.index')->with('success', 'Ambil kuliah berhasil dihapus!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NRP' => 'required|string|max:5',
            'IDMK' => 'required|string|max:5',
            'NilaiAngka' => 'required|numeric|max:100|min:0',
        ], [
            'NilaiAngka.max' => 'Nilai Angka harus kurang dari atau sama dengan :max.',
            'NilaiAngka.min' => 'Nilai Angka harus lebih dari atau sama dengan :min.',
        ]);
        try {
            $data = [
                'NRP' => $request->input('NRP'),
                'IDMK' => $request->input('IDMK'),
                'NilaiAngka' => $request->input('NilaiAngka'),
            ];
    
            AmbilKuliah::create($data);
    
            return redirect()->route('ambil_kuliah.index')->with('success', 'Ambil Mata Kuliah berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('ambil_kuliah.create')->with('error', 'Gagal input Ambil Mata Kuliah. Pastikan data yang Anda masukkan benar.');
        }
        
    }


    public function update(Request $request, $NRP, $IDMK)
{
    $item = DB::table('AmbilKuliah')
        ->where('NRP', $NRP)
        ->where('IDMK', $IDMK)
        ->first();

    if ($item) {
        $data = $request->validate([
            'NilaiAngka' => 'required|numeric|max:100|min:0',
        ],[
            'NilaiAngka.max' => 'Nilai Angka harus kurang dari atau sama dengan :max.',
            'NilaiAngka.min' => 'Nilai Angka harus lebih dari atau sama dengan :min.',
        ]);

        DB::table('AmbilKuliah')
            ->where('NRP', $NRP)
            ->where('IDMK', $IDMK)
            ->update($data);

        return redirect()->route('ambil_kuliah.index')->with('success', 'Ambil Kuliah berhasil diedit!');
    } else {
        return redirect()->route('ambil_kuliah.index')->with('error', 'Ambil Kuliah tidak ditemukan!');
    }
}

}
