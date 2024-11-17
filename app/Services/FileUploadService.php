<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\FileUploadException;
use Illuminate\Support\Facades\Log;
use Exception;

class FileUploadService
{
    public function uploadFile(Request $request, $inputKey, $folder = 'logos')
    {
        $validator = Validator::make($request->all(), [
            $inputKey => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,doc,docx,txt|max:2048', // Max size 2MB
        ]);

        if ($validator->fails()) {

            Log::error('Invalid file upload request.', ['errors' => $validator->errors()]);
            throw new FileUploadException('Invalid file upload request.');
        }

        try {
            $file = $request->file($inputKey);

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = Storage::disk('s3')->putFileAs('V2/' . $folder, $file, $filename, 'public');

            if ($path === false) {
                Log::error('File upload failed: unable to upload to S3.');
                throw new FileUploadException('File upload failed, please try again.');
            }

            $url = 'https://cdn.100kgoral.org' . '/' . $path;
            // $url = env('AWS_RETURN_URL') . '/' . $path;

            return $url;
        } catch (Exception $e) {
            Log::error('File upload failed', ['exception' => $e->getMessage()]);
            throw new FileUploadException('File upload failed, please try again.');
        }
    }
}
