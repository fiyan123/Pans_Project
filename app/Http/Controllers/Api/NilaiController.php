<?php

namespace App\Http\Controllers\Api;

use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Exception;

class NilaiController extends Controller
{
    public function index()
    {
        $data = Nilai::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        }
        else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'id_guru'         => 'required',
            'id_siswa'        => 'required',
            'id_kelas'        => 'required',
            'nilai_kehadiran' => 'required',
            'nilai_harian'    => 'required',
            'pas'             => 'required',
            'pat'             => 'required',
        ]);

            $nilai = new Nilai();

            $nilai->id_guru = $request->id_guru;
            $nilai->id_siswa = $request->id_siswa;
            $nilai->id_kelas = $request->id_kelas;
            $nilai->nilai_kehadiran = $request->nilai_kehadiran;
            $nilai->nilai_harian = $request->nilai_harian;
            $nilai->pas = $request->pas;
            $nilai->pat = $request->pat;
            $nilai->raport = ($request->nilai_kehadiran + $request->nilai_harian + $request->pas + $request->pat) / 4;
            
            if ($nilai->raport >= 90 && $nilai->raport <= 100) {
                $grade = "A";
            } elseif ($nilai->raport >= 80 && $nilai->raport <= 89) {
                $grade = "B";
            } elseif ($nilai->raport >= 70 && $nilai->raport <= 79) {
                $grade = "C";
            } elseif ($nilai->raport >= 60 && $nilai->raport <= 69) {
                $grade = "D";
            } else {
                $grade = "E";
            }
            $nilai->nilai_grade = $grade;
            $nilai->save();

            return response()->json([
                "status" => 200,
                "message" => "Data Success Added",
        ]);
    }

    public function show($id)
    {
        $data = Nilai::where('id','=',$id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        }
        else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'id_guru'         => 'required',
            'id_siswa'        => 'required',
            'id_kelas'        => 'required',
            'nilai_kehadiran' => 'required',
            'nilai_harian'    => 'required',
            'pas'             => 'required',
            'pat'             => 'required',

        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->id_kelas = $request->id_kelas;
        $nilai->id_siswa = $request->id_siswa;
        $nilai->id_guru = $request->id_guru;
        $nilai->nilai_kehadiran = $request->nilai_kehadiran;
        $nilai->nilai_harian = $request->nilai_harian;
        $nilai->pas = $request->pas;
        $nilai->pat = $request->pat;
        $raport = ($request->nilai_kehadiran + $request->nilai_harian + $request->pas + $request->pat) / 4;
        $nilai->raport = $raport;

        if ($nilai->raport >= 90 && $nilai->raport <= 100) {
            $grade = "A";
        } elseif ($nilai->raport >= 80 && $nilai->raport <= 89) {
            $grade = "B";
        } elseif ($nilai->raport >= 70 && $nilai->raport <= 79) {
            $grade = "C";
        } elseif ($nilai->raport >= 60 && $nilai->raport <= 69) {
            $grade = "D";
        } else {
            $grade = "E";
        }
        $nilai->nilai_grade = $grade;
        $nilai->save();

        return response()->json([
            "status" => 200,
            "message" => "Succesfully Update Data",
        ]);
    }

    public function destroy($id)
    {
        try {
            
            $nilai = Nilai::findOrFail($id);

            $data = $nilai->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destroy Data');
            }
            else {
                return ApiFormatter::createApi(400, 'failed');
            }

        } 
        catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
        }
    }
}
