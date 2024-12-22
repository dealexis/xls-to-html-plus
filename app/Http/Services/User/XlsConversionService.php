<?php

namespace App\Http\Services\User;

use App\Models\Conversion;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class XlsConversionService
{
    protected Conversion $conversion;
    protected UploadedFile $file;

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

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function createConversion($type, $columns, $f_header_row, $f_header_row_wr): void
    {
        $user_id = Auth::id();
        $conversion = new Conversion();
        $conversion->fill([
            'user_id' => $user_id,
            'type' => $type,
            'columns' => $columns,
            'f_header_row' => $f_header_row,
            'f_header_row_wr' => $f_header_row_wr,
        ]);

        $conversion->save();

        $conversion->addMedia($this->file)
            ->preservingOriginal()
            ->toMediaCollection();

        $this->conversion = $conversion;
    }

    public function convertToHtml(): string
    {

        $spreadsheet = IOFactory::load($this->file->getPathname());
        $columns = $this->conversion->columns;

        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);

        if ($columns) {
            $data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $data);
        }

        $html = '<table>';
        foreach ($data as $row) {
            $html .= "\n\t<tr>";
            foreach ($row as $cell) {
                $html .= "\n\t\t<td>" . htmlspecialchars($cell ?? '') . "</td>";
            }
            $html .= "\n\t</tr>";
        }
        $html .= "\n</table>";

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        return $dom->saveHTML();
    }

    public function convertToJson(): array
    {
        $spreadsheet = IOFactory::load($this->file->getPathname());
        $columns = $this->conversion->columns;
        $f_header_row = $this->conversion->f_header_row;
        $f_header_row_wr = $this->conversion->f_header_row_wr;

        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);

        if ($columns) {
            $data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $data);
        }

        if ($f_header_row) {
            $headers = array_values(array_shift($data));

            if ($f_header_row_wr)
                $headers = array_map(function ($header) {
                    return preg_replace("/ /", '_', $header);
                }, $headers);

            $data = array_map(function ($row) use ($headers) {
                $row = array_values($row);
                return array_combine($headers, $row);
            }, $data);
        }

        return $data;
    }
}
