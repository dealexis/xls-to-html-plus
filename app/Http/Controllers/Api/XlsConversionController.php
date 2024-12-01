<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Response;
use App\Http\Services\XlsConversionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class XlsConversionController extends Controller
{
    public function __construct(private readonly XlsConversionService $xlsConversionService)
    {
    }

    public function convertXls(Request $request): JsonResponse
    {
        $request->validate([
            'xls_file' => 'required|file|mimes:xls,xlsx|max:20480',
        ]);

        try {
            $output = $request->get('output');
            $file = $request->file('xls_file');

            $this->xlsConversionService->loadFile($file);

            $result = match ($output) {
                'json' => $this->xlsConversionService->convertToJson(),
                default => $this->xlsConversionService->convertToHtml(),
            };

            return Response::success('', $result);
        } catch (\Exception $e) {
            return Response::error('Failed to convert file: ' . $e->getMessage());
        }
    }
}
