<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Dosen;
class MentorController extends Controller
{
    public function index()
    {
        $mentor = Mentor::paginate(5);

        $bidang = Bidang:: all();

        return view("mentor.index", compact('mentor', 'bidang'));
    }

    public function create()
    {
        $mentor = mentor::all();
        $model1 = new mentor();
        $dosen = Dosen::all();
        $model2 = new Dosen();
        return view("mentor.create", compact('mentor','model1','dosen','model2'));
    }

    public function show(string $NRP)
    {
        $mentor = mentor::where('NRP', $NRP)->first();
        $dosen = Dosen::all();
        return view("mentor.view", compact('mentor', 'dosen'));
    }
    public function edit(mentor $mentor)
    {
        $dosenWali = Dosen::all();
        return view("mentor.update", compact('mentor', 'dosenWali'));
    }

    public function destroy($NRP)
    {
        $mentor = mentor::find($NRP);

        if (!$mentor) {
            return redirect()->route('mentor.index')->with('error', 'mentor tidak ditemukan!');
        }

        $mentor->delete();

        return redirect()->route('mentor.index')->with('success', 'mentor berhasil dihapus!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NRP' => 'required|max:5|string',
            'NamaMhs' => 'required|string',
            'Alamat' => 'required|string',
            'IDDosen' => 'required|max:5|string',
            'IPK' => 'required|numeric|max:4|min:0',
            'JenisKelamin' => 'required|string',
        ], [
            'IPK.max' => 'IPK harus kurang dari atau sama dengan :max.',
            'IPK.min' => 'IPK harus lebih dari atau sama dengan :min.',
        ]);

        try {
            $data = [
                'NRP' => $request->input('NRP'),
                'NamaMhs' => $request->input('NamaMhs'),
                'Alamat' => $request->input('Alamat'),
                'IDDosen' => $request->input('IDDosen'),
                'IPK' => $request->input('IPK'),
                'JenisKelamin' => $request->input('JenisKelamin')
            ];
    
            mentor::create($data);
    
            return redirect()->route('mentor.index')->with('success', 'mentor berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('mentor.create')->with('error', 'Gagal input mentor. Pastikan data yang Anda masukkan benar.');
        }
    }

    public function update(Request $request, mentor $mentor)
    {
        $this->validate($request, [
            'NamaMhs' => 'required|string',
            'Alamat' => 'required|string',
            'IDDosen' => 'required|max:5|string',
            'IPK' => 'required|numeric|max:4|min:0',
            'JenisKelamin' => 'required|string',
        ], [
            'IPK.max' => 'IPK harus kurang dari atau sama dengan :max.',
            'IPK.min' => 'IPK harus lebih dari atau sama dengan :min.',
        ]);

        $mentor->update($request->all());

        return redirect()->route('mentor.index')->with('success', 'mentor berhasil diperbarui!');

    }

}
