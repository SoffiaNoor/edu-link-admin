<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempat;
use App\Models\Ruang;
use App\Models\MataKuliah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TempatController extends Controller
{
    public function index()
    {
        $tempat = Tempat::paginate(5);

        return view("tempat.index", compact('tempat'));
    }
    public function create()
    {
        $ruang = Ruang::all();
        $model1 = new Ruang();
        $mataKuliah = MataKuliah::all();
        $model2 = new MataKuliah();

        return view("tempat.create", compact('ruang', 'model1', 'mataKuliah', 'model2'));
    }

    public function show(string $IDRuang, string $IDMK)
    {
        $tempat = Tempat::where('IDRuang', $IDRuang)
            ->where('IDMK', $IDMK)
            ->first();

        $jam_selesai_from_database = $tempat->jam_selesai;
        $jam_mulai_from_database = $tempat->jam_mulai;
        $time_as_carbon = Carbon::parse($jam_selesai_from_database);
        $time_as_carbon_2 = Carbon::parse($jam_mulai_from_database);
        $formatted_time_1 = $time_as_carbon->format('H:i');
        $formatted_time_2 = $time_as_carbon_2->format('H:i');

        return view("tempat.view", compact('tempat','formatted_time_1','formatted_time_2'));
    }
    public function edit($IDRuang, $IDMK)
    {
        $tempat = Tempat::where('IDRuang', $IDRuang)
            ->where('IDMK', $IDMK)
            ->first();

        $jam_selesai_from_database = $tempat->jam_selesai;
        $jam_mulai_from_database = $tempat->jam_mulai;
        $time_as_carbon = Carbon::parse($jam_selesai_from_database);
        $time_as_carbon_2 = Carbon::parse($jam_mulai_from_database);
        $formatted_time_1 = $time_as_carbon->format('H:i');
        $formatted_time_2 = $time_as_carbon_2->format('H:i');

        if (!$tempat) {
            return redirect()->route('tempat.index')->with('error', 'Tempat tidak ditemukan!');
        }

        return view("tempat.update", compact('tempat', 'formatted_time_1', 'formatted_time_2'));
    }

    public function destroy(string $IDRuang, string $IDMK)
    {
        $tempat = DB::table('Tempat')
            ->where('IDRuang', $IDRuang)
            ->where('IDMK', $IDMK)
            ->first();

        if (!$tempat) {
            return redirect()->route('tempat.index')->with('error', 'Kelas Mata kuliah tidak ditemukan!');
        }

        DB::table('Tempat')
            ->where('IDRuang', $IDRuang)
            ->where('IDMK', $IDMK)
            ->delete();

        return redirect()->route('tempat.index')->with('success', 'Kelas Mata Kuliah berhasil dihapus!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'IDRuang' => 'required|string|max:5',
            'IDMK' => 'required|string|max:5',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
        ]);
        try {
            $data = [
                'IDRuang' => $request->input('IDRuang'),
                'IDMK' => $request->input('IDMK'),
                'jam_mulai' => $request->input('jam_mulai'),
                'jam_selesai' => $request->input('jam_selesai'),
            ];
    
            Tempat::create($data);
    
            return redirect()->route('tempat.index')->with('success', 'Kelas Mata Kuliah berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('tempat.create')->with('error', 'Gagal input Kelas Mata Kuliah. Pastikan data yang Anda masukkan benar.');
        }
        
    }

    public function update(Request $request, $IDRuang, $IDMK)
    {
        $item = DB::table('Tempat')
            ->where('IDRuang', $IDRuang)
            ->where('IDMK', $IDMK)
            ->first();

        if ($item) {
            $data = $request->validate([
                'jam_mulai' => 'required',
                'jam_selesai' => 'required',
            ]);

            DB::table('Tempat')
                ->where('IDRuang', $IDRuang)
                ->where('IDMK', $IDMK)
                ->update($data);

            return redirect()->route('tempat.index')->with('success', 'Tempat berhasil diedit!');
        } else {
            return redirect()->route('tempat.index')->with('error', 'Tempat tidak ditemukan!');
        }
    }

}