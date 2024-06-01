<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UploadImagemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImagemController extends Controller
{
    protected $service;

    public function __construct(UploadImagemService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $imagens = $this->service->getImagens();
        return response()->json(['data' => $imagens]);
    }

    public function store(Request $request)
    {
        // Validar o arquivo de imagem
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,jpeg,gif|max:2048',
            'identificadorUser' => 'required|max:2048',
        ]);
    
        try {
            // Salvar a imagem usando o serviço
            $path = $this->service->saveImage($request->file('file'), $request->identificadorUser);
            return response()->json(['message' => 'Imagem salva com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function destroy($id)
    {
        $imageRecord = $this->service->getImagens()->where('id', $id)->first();
    
        if (!$imageRecord) {
            return response()->json(['error' => 'Imagem não encontrada'], 404);
        }
    
        // Caminho completo da imagem
        $filePath = storage_path('app/public/images/') . $imageRecord->caminho_da_imagem;
    
        // Verifica se o arquivo existe e tenta deletá-lo
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
        // Deleta o registro do banco de dados
        $imageRecord->delete();
    
        return response()->json(['message' => 'Imagem deletada com sucesso'], 200);
    }
}
