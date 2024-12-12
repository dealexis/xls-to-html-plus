<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

class XlsConversionService
{
    protected UploadedFile $file;

    public function convertToHtml(array $data = []): string
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $sheet_data = $sheet->toArray(null, true, true, true);

        $columns = !isset($data['columns']) ?: $data['columns'];

        if ($columns) {
            $sheet_data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $sheet_data);
        }

        $html = '<table>';
        foreach ($sheet_data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . htmlspecialchars($cell) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }

    public function convertToJson(array $data = []): array
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();

        $columns = isset($data['columns']) ?$data['columns'] : false;

        $sheet_data = $sheet->toArray(null, true, true, true);

        if ($columns) {
            $sheet_data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $sheet_data);
        }

        return $sheet_data;
    }

    /**
     * @throws Exception
     */
    public function loadFile($file): void
    {
        if (null === $file) {
            throw new Exception('File not loaded');
        }

        $this->file = $file;
    }
}
