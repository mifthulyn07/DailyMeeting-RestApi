<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\AbsensiService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Resources\Absensi\AbsensiResource;
use App\Http\Resources\Absensi\AbsensiCollection;
use App\Http\Resources\Absensi\AbsenMasukResource;
use App\Http\Resources\Absensi\AbsenPulangResource;
use App\Http\Requests\API\Absensi\AbsenMasukRequest;
use App\Http\Requests\API\Absensi\AbsenPulangRequest;
use App\Http\Resources\Absensi\HistoryAbsenCollection;

class AbsensiController extends Controller
{
    protected $service;

    public function __construct(AbsensiService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        try {
            $me = Auth::user()->id;
            $response = $this->service->index($request, $me);
            return $this->successResp('Berhasil mendapatkan data!', new AbsensiCollection($response));
        } catch (ValidationException $th) {
            return $this->errorResp($th->errors());
        }
    }

    public function show($id)
    {
        try {
            $response = $this->service->show($id);
            return $this->successResp('Berhasil mendapatkan data!', new AbsensiResource($response));
        } catch (ValidationException $th) {
            return $this->errorResp($th->errors());
        }
    }

    public function historyAbsen(Request $request)
    {
        try {
            $me = Auth::user()->id;
            $response = $this->service->historyAbsen($request, $me);
            return $this->successResp('Berhasil mendapatkan data!', new HistoryAbsenCollection($response));
        } catch (ValidationException $th) {
            return $this->errorResp($th->errors());
        }
    }

    public function absenMasuk(AbsenMasukRequest $request){
        try {
            $me = Auth::user()->id;
            $response = $this->service->absenMasuk($request, $me);
            return $this->successResp('Berhasil melakukan absensi masuk!', new AbsenMasukResource($response));
        } catch (ValidationException $th) {
            return $this->errorResp($th->errors());
        }
    }

    public function absenPulang(AbsenPulangRequest $request, $id)
    {
        try {
            $me = Auth::user()->id;
            $response = $this->service->absenPulang($request, $me, $id);
            return $this->successResp('Berhasil melakukan absensi pulang!', new AbsenPulangResource($response));
        } catch (ValidationException $th) {
            return $this->errorResp($th->errors());
        }
    }
}
