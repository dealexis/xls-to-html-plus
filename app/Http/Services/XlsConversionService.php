<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Html;

class XlsConversionService
{
    private UploadedFile $file;

    public function convertToHtml(): string
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $htmlWriter = new Html($spreadsheet);
        return $htmlWriter->generateSheetData();
    }

    public function convertToJson(): array
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        return $sheet->toArray(null, true, true, true);
    }

    public function loadFile($file): void
    {
        $this->file = $file;
    }
}
