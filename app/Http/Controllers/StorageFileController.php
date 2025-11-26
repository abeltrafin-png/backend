<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;

class StorageFileController extends Controller
{
    /**
     * Serve a PDF file from the storage/app/public directory.
     *
     * @param string $filepath Relative file path within the "public" disk (like akademik/filename.pdf)
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function serve($filepath)
    {
        $disk = Storage::disk('public');

        if (!$disk->exists($filepath)) {
            return response()->json(['message' => 'File not found.'], 404);
        }

        $absolutePath = storage_path('app/public/' . $filepath);
        $file = new File($absolutePath);
        $mimeType = $file->getMimeType();

        if ($mimeType !== 'application/pdf') {
            return response()->json(['message' => 'File is not a PDF.'], 400);
        }

        $fileContent = $disk->get($filepath);

        return response($fileContent, 200)
                ->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="' . basename($filepath) . '"');
    }
}
