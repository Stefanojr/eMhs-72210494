<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MhsAPIController extends Controller
{
    public function read()
    {
        $mhs = Mahasiswa::all();
        return response()->json([
            'success' => true,
            'message' => "Data Berhasil Ditampilkan",
            'data' => $mhs
        ],200);
    }

    public function create(Request $request)
    {
        $mhs = Mahasiswa::create([
            'nim' => $request -> nim,
            'nama' => $request -> nama,
            'gender' => $request -> gender,
            'prodi' => $request -> prodi,
            'minat' => $request -> minat

        ]);

        if ($mhs)
        {
            return response()->json([
                'success' => true,
                'message' => "Data Berhasil Ditambahkan",
                'data' => $mhs
            ],200);
        }else{

            return response()->json([
                'success' => false,
                'message' => "Data Gagal Ditambahkan",
                'data' => $mhs
            ],200);
        }
    }

    public function update($id, Request $request)
    {
        $mhs = Mahasiswa::whereId($id)->update([
            'nim' => $request -> nim,
            'nama' => $request -> nama,
            'gender' => $request -> gender,
            'prodi' => $request -> prodi,
            'minat' => $request -> minat
        ]);

        if ($mhs)
        {
            return response()->json([
                'success' => true,
                'message' => "Data Berhasil Diubah",
                'data' => $mhs
            ],200);
        }else{

            return response()->json([
                'success' => false,
                'message' => "Data Gagal Diubah",
                'data' => $mhs
            ],400);
        }
    }

    
    public function delete($id){
        $mhs = Mahasiswa::find($id);
        $mhs->delete();

        if ($mhs)
        {
            return response()->json([
                'success' => true,
                'message' => "Data Berhasil Dihapus",
                'data' => $mhs
            ],200);
        }else{

            return response()->json([
                'success' => false,
                'message' => "Data Gagal Dihapus",
                'data' => $mhs
            ],400);
    }
   
}

}