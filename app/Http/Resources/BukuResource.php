<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
{   
    
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_buku' => $this->id_buku,
            'judul_buku' => $this->judul_buku,
            'sinopsis' => $this->sinopsis,
            'id_genre' => $this->nama_kategori,
            'gambar' => $this->gambar,
        ];
    }
}
