<?php

namespace App\Interfaces\IServices;

interface UploadImagemServiceInterface
{
    public function getImagens();
    public function saveImage($file, $identificadorUser);
    public function deleteImage($id);
}
