<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

use App\Http\Helpers\Response;
use App\Http\Services\User\XlsConversionService;
use App\Resources\ConversionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use function App\is_arr_uc;

class UserXlsConversionController extends Controller
{
    public function __construct(private readonly XlsConversionService $xlsConversionService)
    {
    }

    public function index(): JsonResource
    {
        return ConversionResource::collection(Auth::user()->conversions()->orderBy('created_at', 'desc')->get());
    }

    public function convertXls(Request $request): \Illuminate\Http\JsonResponse
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
            $columns = $request->get('columns') ?? [];
            $file = $request->file('xls_file');
            $f_header_row = (bool)$request->input('f_header_row');
            $f_header_row_wr = (bool)$request->input('f_header_row_wr');

            if (!is_arr_uc($columns)) {
                throw new \Exception('Columns must be an array of uppercase letters');
            }

            $this->xlsConversionService->loadFile($file);
            $this->xlsConversionService->createConversion($output, $columns, $f_header_row, $f_header_row_wr);

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
