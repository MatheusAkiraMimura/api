<?php

namespace App\Services;

use App\Repositories\UploadImagemRepository;
use App\Models\UploadImagem;
use Illuminate\Support\Facades\DB;

class UploadImagemService
{
    protected $repository;

    public function __construct(UploadImagemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getImagens()
    {
        return $this->repository->getAll();
    }

    public function saveImage($file, $identificadorUser)
    {
        return DB::transaction(function () use ($file, $identificadorUser) {
            $folderPath = storage_path('app/public/images/');

            // Verificar se o diretório existe, se não existir, criar o diretório
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            // Definir as permissões corretas no diretório
            chmod($folderPath, 0777);

            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Verificar se já existe um arquivo com o mesmo nome na pasta
            while (file_exists($folderPath . $imageName)) {
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            }

            // Salvar o arquivo no diretório especificado
            $file->move($folderPath, $imageName);

            // Verifica se o arquivo é uma imagem válida
            $mimeType = mime_content_type($folderPath . $imageName);
            if (substr($mimeType, 0, 6) !== 'image/') {
                unlink($folderPath . $imageName);
                throw new \Exception('Invalid file type');
            }

            // Limite de tamanho do arquivo em bytes (1MB)
            $limitSize = 1048576;

            // Verifica se o arquivo não ultrapassa o limite de tamanho
            if (filesize($folderPath . $imageName) > $limitSize) {
                unlink($folderPath . $imageName);
                throw new \Exception('File size limit exceeded');
            }

            // Define os limites de largura e altura da imagem em pixels
            define('MAX_IMAGE_WIDTH', 2000);
            define('MAX_IMAGE_HEIGHT', 2000);

            // Obtém as dimensões da imagem
            $image_info = getimagesize($folderPath . $imageName);
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            // Verifica se as dimensões da imagem estão dentro dos limites
            if ($image_width > MAX_IMAGE_WIDTH || $image_height > MAX_IMAGE_HEIGHT) {
                unlink($folderPath . $imageName);
                throw new \Exception('Image dimensions too large');
            }

            // Salvar o registro da imagem no banco de dados
            $uploadImagem = new UploadImagem();
            $uploadImagem->caminho_da_imagem = $imageName;
            $uploadImagem->identificadorUser = $identificadorUser;
            $uploadImagem->save();

            return 'public/images/' . $imageName;
        });
    }
}
