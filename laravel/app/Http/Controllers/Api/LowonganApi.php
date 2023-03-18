<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LowonganRequest;
use App\Http\Resources\LowonganResource;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class LowonganApi extends ResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowongan = Lowongan::all();
        return $this->sendResponse(LowonganResource::collection($lowongan), 'Products retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LowonganRequest $request)
    {

        $input = $request->all();
        $lowongan = Lowongan::create($input);

        return $this->sendResponse(new LowonganResource($lowongan), 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LowonganRequest $request, string $id)
    {
        Lowongan::whereId($id)->update($request->all());
        return $this->sendResponse('', 'Data berhasil DiEdit' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lowongan::whereId($id)->delete();

        return $this->sendResponse('', 'Data Berhasil Dihapus');
    }
}
