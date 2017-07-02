<?php
namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Input, File;

class CommonController extends BaseController
{

    public function uploadImage()
    {
        $rules = [
            'image' => 'required',
        ];
        $result = [
            'success' => 0,
            'message' => '上传失败',
            'url' => '',
        ];
        if (true === $this->_checkParams($rules)) {
            $file = Input::file('image');
            $ext = $file->guessExtension();
            $newFilename = uniqid('img_') . '.' . $ext;// 生成img_ + 13位字符的唯一ID
            $result = $file->move(storage_path('images'), $newFilename);
            $result = [
                'success' => 1,
                'message' => '上传成功',
                'url' => route('home') . '/download/image/' . $newFilename,
            ];
        }

        return response()->json($result);
    }

    public function downloadImage($filename)
    {
        $filepath = storage_path('images/' . $filename);
        if (File::exists($filepath)) {
            return response()->download($filepath);
        } else {
            return response()->make('File not found.');
        }
    }
}
