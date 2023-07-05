<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{
    // show all data
    public function index()
    {
        $data['kategori'] = kategori::all();
        
       //get resource
         return KategoriResource::collection($data['kategori']);
         //mengembalikan json
        //return response()->json($data);

        // return view('serverside/kategori', $data);
    }

    // show form add data
    // public function create()
    // {
    //     return view('serverside/addkategori');
    // }

    // add data
    public function store(Request $request)
    {
        // $save = new kategori;
        // $save->nama_genre = request('nama_genre');
        // $save->save();
        // return redirect('serverside/kategori');

        $request->validate([
            'nama_kategori' => 'required',
            'warna' => 'required',
        ]);

        $kategori = kategori::create($request->all());
        //make new resource
        return new KategoriResource($kategori);
    }

}
