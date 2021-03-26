<?php

namespace App\Traits;

trait UploadTrait
{


    public function uploadFile($file, $directory = 'unknown')
    {
        $name = time() . rand(1000000, 9999999) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/images/' . $directory, $name);
        return $name;
    }

    public function deleteFile($file_name, $directory = 'unknown')
    {
        if (file_exists('public/' . $directory . '/' . $file_name))
            unlink('public/' . $directory . '/' . $file_name);
    }

}
