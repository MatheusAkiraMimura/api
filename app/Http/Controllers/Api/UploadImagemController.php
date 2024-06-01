<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadImagemRequest;
use App\Http\Resources\UploadImagemResource;
use App\Interfaces\IServices\UploadImagemServiceInterface;

class UploadImagemController extends Controller
{
    protected $service;

    public function __construct(UploadImagemServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $imagens = $this->service->getImagens();
        return UploadImagemResource::collection($imagens);
    }

    public function store(StoreUploadImagemRequest $request)
    {
        try {
            $path = $this->service->saveImage($request->file('file'), $request->identificadorUser);
            return response()->json(['message' => 'Imagem salva com sucesso', 'path' => $path], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->deleteImage($id);
            return response()->json(['message' => 'Imagem deletada com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
