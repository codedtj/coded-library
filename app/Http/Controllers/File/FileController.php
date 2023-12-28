<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Http\Responses\FileResponse;
use App\Models\BaseFile;
use App\Services\File\FileDownloadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    public function __construct(private readonly FileDownloadService $service)
    {
    }

    public function view(BaseFile $file): Response|StreamedResponse|JsonResponse
    {
        $response = new FileResponse($file->getPath(), $file->getMimeType());
        return $response->generateResponse();
    }

    public function download(BaseFile $file): StreamedResponse
    {
        return $this->service->download($file);
    }
}
