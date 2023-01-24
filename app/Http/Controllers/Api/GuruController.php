<?php

namespace App\Http\Controllers\Api;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Exception;

class GuruController extends Controller
{
    
    public function index()
    {
        $data = Guru::all();

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
        $validate = $request->validate([
            'nip'            => 'required|unique:gurus',
            'nama'           => 'required',
            'mata_pelajaran' => 'required',
            'jenis_kelamin'  => 'required',
        ]);

            $guru = new Guru();

            $guru->nip = $request->nip; 
            $guru->nama = $request->nama; 
            $guru->mata_pelajaran = $request->mata_pelajaran; 
            $guru->jenis_kelamin = $request->jenis_kelamin; 
            $guru->save();

            return response()->json([
                "status"  => 200,
                "message" => "Data Success Added",
        ]);
    }

    public function show($id)
    {
        $data = Guru::where('id','=',$id)->get();

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
        // Validasi
        $validated = $request->validate([
            'nip'            => 'required',
            'nama'           => 'required',
            'mata_pelajaran' => 'required',
            'jenis_kelamin'  => 'required',
        ]);

            $guru = Guru::findOrFail($id);

            $guru->nip = $request->nip;
            $guru->nama = $request->nama;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->save();
        
            return response()->json([
                "Status" => 200,
                "Message" => "Succesfully Update Data",
        ]);
    }

    public function destroy($id)
    {
        try {
            
            $guru = Guru::findOrFail($id);

            $data = $guru->delete();

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
