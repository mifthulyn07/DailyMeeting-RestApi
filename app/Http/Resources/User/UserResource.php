<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,  
            'nama' => $this->nama,
            'role' => $this->role,
            'email' => $this->email,
            'jns_kelamin' => $this->jns_kelamin,
            'no_telp' => $this->no_telp,
            'alamat' => $this->alamat,
            'mulai_kerja' => $this->mulai_kerja,
        ];
    }
}
