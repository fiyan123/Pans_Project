<?php

namespace App\Http\Controllers\Api;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Exception;

class SiswaController extends Controller
{
   
    public function index()
    {
        $data = Siswa::all();

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
            'nis'           => 'required|unique:siswas',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'id_kelas'      => 'required',
        ]);

        $siswa = new Siswa();
        
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();

        return response()->json([
            "status"  => 200,
            "message" => "Data success added",
        ]);
    }

    public function show($id)
    {
        $data = Siswa::where('id','=',$id)->get();

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
            'nis'           => 'required',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'id_kelas'      => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();

        return response()->json([
            "status"  => 200,
            "message" => "Data Success Added",
        ]);
    }

    public function destroy($id)
    {
        try {
            
            $siswa = Siswa::findOrFail($id);

            $data = $siswa->delete();

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
