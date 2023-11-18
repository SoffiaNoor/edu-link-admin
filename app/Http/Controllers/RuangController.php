<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;

class RuangController extends Controller
{
    public function index()
    {
        $Ruang = Ruang::paginate(5);

        return view("ruang.index", compact('Ruang'));
    }
    public function create()
    {
        return view("ruang.create");
    }


    public function show(string $IDRuang)
    {
        $Ruang = Ruang::where('IDRuang', $IDRuang)->first();
        return view("ruang.view", compact('Ruang'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'IDRuang' => 'required|max:5|string',
            'NamaRuang' => 'required|string',
            'Kapasitas'=> 'required|integer|min:1',
        ], [
            'Kapasitas.min' => 'Kapasitas harus lebih dari atau sama dengan :min.',
        ]);
        
        try {
            $data = [
                'IDRuang' => $request->input('IDRuang'),
                'NamaRuang' => $request->input('NamaRuang'),
                'Kapasitas' => $request->input('Kapasitas'),
            ];
    
            Ruang::create($data);
    
            return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('ruang.create')->with('error', 'Gagal input Ruang. Pastikan data yang Anda masukkan benar.');
        }
        
    }

    public function update(Request $request, Ruang $Ruang)
    {
        $this->validate($request, [
            'NamaRuang' => 'required|string',
            'Kapasitas' => 'required|integer|min:1',
        ], [
            'Kapasitas.min' => 'Kapasitas harus lebih dari atau sama dengan :min.',
        ]);

        $Ruang->update($request->all());

        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diperbarui!');

    }

    public function destroy($id)
    {
        $Ruang = Ruang::find($id);

        if (!$Ruang) {
            return redirect()->route('ruang.index')->with('error', 'Ruang tidak ditemukan!');
        }

        $Ruang->delete();

        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus!');
    }


    public function edit(Ruang $Ruang)
    {
        return view("ruang.update", compact('Ruang'));
    }
}
