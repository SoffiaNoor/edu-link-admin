<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $Dosen = Dosen::paginate(5);

        return view("dosen.index", compact('Dosen'));
    }
    public function create()
    {
        return view("dosen.create");
    }


    public function show(string $IDDosen)
    {
        $Dosen = Dosen::where('IDDosen', $IDDosen)->first();
        return view("dosen.view", compact('Dosen'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'IDDosen' => 'required|max:5|string',
            'NamaDosen' => 'required|string',
            'Alamat' => 'required|string',
        ]);

        try {
            $data = [
                'IDDosen' => $request->input('IDDosen'),
                'NamaDosen' => $request->input('NamaDosen'),
                'Alamat' => $request->input('Alamat'),
            ];
    
            Dosen::create($data);
    
            return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('dosen.create')->with('error', 'Gagal input Dosen. Pastikan data yang Anda masukkan benar.');
        }
    }

    public function update(Request $request, Dosen $Dosen)
    {
        $this->validate($request, [
            'NamaDosen' => 'required|string',
            'Alamat' => 'required|string',
        ]);

        $Dosen->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui!');

    }

    public function destroy($id)
    {
        $Dosen = Dosen::find($id);

        if (!$Dosen) {
            return redirect()->route('dosen.index')->with('error', 'Dosen tidak ditemukan!');
        }

        $Dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus!');
    }


    public function edit(Dosen $Dosen)
    {
        return view("dosen.update", compact('Dosen'));
    }
}