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

        $columns = isset($data['columns']) ? $data['columns'] : false;

        if ($columns) {
            $sheet_data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $sheet_data);
        }

        $html = '<table class="printed-table">';
        foreach ($sheet_data as $row) {
            $html .= "\n\t<tr>";  // Add tabulation for <tr>
            foreach ($row as $cell) {
                $html .= "\n\t\t<td>" . htmlspecialchars($cell ?? '') . "</td>";  // Add tabulation for <td>
            }
            $html .= "\n\t</tr>";  // Close <tr> with tabulation
        }
        $html .= "\n</table>";  // Close table with tabulation

        // Use DOMDocument to format the HTML
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        // Load the raw HTML into DOMDocument
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Return the formatted HTML
        return $dom->saveHTML();
        #return $html;
    }

    public function convertToJson(array $data = []): array
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();

        $columns = isset($data['columns']) ? $data['columns'] : false;
        $f_header_row = isset($data['f_header_row']) ? $data['f_header_row'] : false;
        $f_header_row_wr = isset($data['f_header_row_wr']) ? $data['f_header_row_wr'] : false;

        $sheet_data = $sheet->toArray(null, true, true, true);

        if ($columns) {
            $sheet_data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $sheet_data);
        }

        if ($f_header_row) {
            $headers = array_values(array_shift($sheet_data));

            if ($f_header_row_wr)
                $headers = array_map(function ($header) {
                    return preg_replace("/ /", '_', $header);
                }, $headers);

            $sheet_data = array_map(function ($row) use ($headers) {
                $row = array_values($row);
                return array_combine($headers, $row);
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
