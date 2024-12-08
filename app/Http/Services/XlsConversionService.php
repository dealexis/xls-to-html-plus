<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;

class XlsConversionService
{
    protected UploadedFile $file;

    public function convertToHtml(): string
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);

        $html = '<table>';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td>' . htmlspecialchars($cell) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }

    public function convertToJson(): array
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        return $sheet->toArray(null, true, true, true);
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
