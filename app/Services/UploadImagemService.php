<?php

namespace App\Services;

use App\Interfaces\IServices\UploadImagemServiceInterface;
use App\Repositories\UploadImagemRepository;
use App\Models\UploadImagem;
use Illuminate\Support\Facades\DB;

class UploadImagemService implements UploadImagemServiceInterface
{
    protected $repository;

    public function __construct(UploadImagemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getImagens()
    {
        return $this->repository->all();
    }

    public function saveImage($file, $identificadorUser)
    {
        return DB::transaction(function () use ($file, $identificadorUser) {
            $folderPath = storage_path('app/public/images/');

            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

            while (file_exists($folderPath . $imageName)) {
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
            }

            $file->move($folderPath, $imageName);

            $mimeType = mime_content_type($folderPath . $imageName);
            if (substr($mimeType, 0, 6) !== 'image/') {
                unlink($folderPath . $imageName);
                throw new \Exception('Invalid file type');
            }

            $limitSize = 1048576;

            if (filesize($folderPath . $imageName) > $limitSize) {
                unlink($folderPath . $imageName);
                throw new \Exception('File size limit exceeded');
            }

            define('MAX_IMAGE_WIDTH', 2000);
            define('MAX_IMAGE_HEIGHT', 2000);

            $image_info = getimagesize($folderPath . $imageName);
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            if ($image_width > MAX_IMAGE_WIDTH || $image_height > MAX_IMAGE_HEIGHT) {
                unlink($folderPath . $imageName);
                throw new \Exception('Image dimensions too large');
            }

            $uploadImagem = new UploadImagem();
            $uploadImagem->caminho_da_imagem = $imageName;
            $uploadImagem->identificadorUser = $identificadorUser;
            $uploadImagem->save();

            return 'public/images/' . $imageName;
        });
    }

    public function deleteImage($id)
    {
        $imageRecord = $this->repository->find($id);

        if (!$imageRecord) {
            throw new \Exception('Imagem não encontrada');
        }

        $filePath = storage_path('app/public/images/') . $imageRecord->caminho_da_imagem;

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $imageRecord->delete();
        return true;
    }
}
