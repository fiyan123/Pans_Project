<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use Exception;

class KelasController extends Controller
{

    public function index(Request $request)
    {
        $data = Kelas::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        }
        else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'kelas'   => 'required',
                'jurusan' => 'required',
            ]);

            $kelas = Kelas::create([
                'kelas'   => $request->kelas,
                'jurusan' => $request->jurusan,
            ]);

            $data = Kelas::where('id','=',$kelas->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'success', $data);
            }
            else {
                return ApiFormatter::createApi(400, 'failed');
            }

        } 
        catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function show($id)
    {
        $data = Kelas::where('id','=',$id)->get();

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
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

            $kelas = Kelas::findOrFail($id);

            $kelas->kelas = $request->kelas;
            $kelas->jurusan = $request->jurusan;
            $kelas->save();
            
            return response()->json([
                "Status" => 200,
                "Message" => "Succesfully Update Data",
        ]);
    }

    public function destroy($id)
    {

        try {
            
            $kelas = Kelas::findOrFail($id);

            $data = $kelas->delete();

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
