<?php

namespace App\Http\Services\User;

use App\Models\Conversion;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class XlsConversionService extends \App\Http\Services\XlsConversionService
{
    protected Conversion $conversion;

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function createConversion($type, $columns): void
    {
        $user_id = Auth::id();
        $conversion = new Conversion();
        $conversion->fill([
            'user_id' => $user_id,
            'type' => $type,
            'columns' => $columns,
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
        $columns = $this->conversion->columns;

        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true);

        if ($columns) {
            $data = array_map(function ($row) use ($columns) {
                return array_intersect_key($row, array_flip($columns));
            }, $data);
        }

        return $data;
    }
}
