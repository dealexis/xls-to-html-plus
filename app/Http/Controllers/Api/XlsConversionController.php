<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Response;
use App\Http\Services\XlsConversionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function App\is_arr_uc;

class XlsConversionController extends Controller
{
    public function __construct(private readonly XlsConversionService $xlsConversionService)
    {
    }

    public function convertXls(Request $request): JsonResponse
    {
        $request->validate([
            'xls_file' => 'required|file|mimes:xls,xlsx|max:20480',
            'output' => 'required|string',
            'columns' => 'array',
            'f_header_row' => 'boolean',
            'f_header_row_wr' => 'boolean',
        ]);

        try {
            $output = $request->get('output');
            $file = $request->file('xls_file');
            $columns = $request->get('columns');
            $this->xlsConversionService->loadFile($file);
            $f_header_row = (bool)$request->input('f_header_row');
            $f_header_row_wr = (bool)$request->input('f_header_row_wr');

            $data = [];
            if ($columns && is_arr_uc($columns)) {
                $data['columns'] = $columns;
            }

            $data['f_header_row'] = $f_header_row;
            $data['f_header_row_wr'] = $f_header_row_wr;

            $result = match ($output) {
                'json' => $this->xlsConversionService->convertToJson($data),
                default => $this->xlsConversionService->convertToHtml($data),
            };

            return Response::success('', $result);
        } catch (\Exception $e) {
            return Response::error('Failed to convert file: ' . $e->getMessage());
        }
    }
}
