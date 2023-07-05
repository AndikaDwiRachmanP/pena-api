<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Buku;
use App\Models\kategori;
use App\Http\Resources\BukuResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $data['buku'] = Buku::all();
         $data['buku'] = Buku::join('kategori', 'kategori.id_genre', '=', 'buku.id_genre')->get();

        return BukuResource::collection($data['buku']);
        //join table genre
        // $data['buku'] = Buku::join('kategori', 'kategori.id_genre', '=', 'buku.id_genre')->get();
        // return view('serverside/master', $data);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'judul_buku' => 'required',
            'sinopsis' => 'required',
            'id_genre' => 'required',
        ]);

        if($request->file){
            $extension = $request->file->extension();
            $filename = time() . '.' . $extension;

            Storage::putfileAs('public/images', $request->file, $filename);
        }
        else{
            $filename = '';
        }

        $request['gambar'] = $filename;
        $buku = buku::create($request->all());
        //join table genre
        $buku = Buku::join('kategori', 'kategori.id_genre', '=', 'buku.id_genre')->get();
        //make new resource
        return new BukuResource($buku);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'judul_buku' => 'required',
            'sinopsis' => 'required',
            'id_genre' => 'required',
            
        ]);

        if($request->file){
            $extension = $request->file->extension();
            $filename = time() . '.' . $extension;

            Storage::putfileAs('public/images', $request->file, $filename);
        }
        else{
            $filename = '';
        }

        $request['gambar']= $filename;
        $buku = Buku::findOrFail($request->id);
        $buku->update($request->all());
        $buku = Buku::join('kategori', 'kategori.id_genre', '=', 'buku.id_genre')->get();
        

        return new BukuResource($buku);

        // $data = Buku::where('id_buku', $id)->first();
        // $data->judul_buku = $request->judul_buku;
        // $data->sinopsis = $request->sinopsis;
        // $data->id_genre = $request->id_genre;
        // $data->UploadImage();
        // $data->save();
        // return redirect('serverside/master');
    }


    public function detail($id)
    {
        $data = Buku::findOrFail($id);
        $data = Buku::join('kategori', 'kategori.id_genre', '=', 'buku.id_genre')->first();
        return new BukuResource($data);
    }

    

    public function destroy($id)
    {
       $buku = Buku::findOrFail($id);
         $buku->delete();
            return new BukuResource($buku);
    }

//     function delete(Buku $data)
//   {
//     Buku::destroy($data->id_buku);
//     return redirect('serverside/master')->with('success', 'Buku berhasil di hapus');
//   }

    // public function search(Request $request)
    // {
    //     $data = Buku::where('judul_buku', 'like', "%".$request->search."%")->get();
    //     return view('serverside.master', $data);
    // }


}
