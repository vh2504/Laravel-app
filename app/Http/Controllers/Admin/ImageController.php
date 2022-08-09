<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImageRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * updaload file in storage.
     *
     * @param ImageRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function uploadFileCkeditor(ImageRequest $request)
    {
        $data = [
            'success' => 1,
            'message' => 'upload success',
        ];
        try {
            $file = $request->file('file');
            /** @var UploadedFile $file */
            $fileName = time() . "." . $file->getClientOriginalExtension();
            $dir = "public/image-ckeditors";
            Storage::putFileAs($dir, $file, $fileName);
            $data['url'] = asset('storage/image-ckeditors/' . $fileName);
        } catch (\Throwable $th) {
            $data['success'] = 0;
            $data['message'] = $th->getMessage();
        }//end try

        return response()->json($data);
    }
}
