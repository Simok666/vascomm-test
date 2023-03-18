<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LowonganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nama" => $this->nama,
            "deskripsi" => $this->deskripsi,
            "tingkat_pendidikan" => $this->tingkat_pendidikan,
            "tanggal_buka" => $this->tanggal_buka,
            "tanggal_tutup" => $this->tanggal_tutup,
            "kuota" => $this->kuota
        ];
    }
}
