<?php

namespace App\Exports;

use App\Models\Candidate;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class CandidatesExport implements 
    WithHeadings, 
    ShouldAutoSize,
    WithEvents,
    WithMapping,
    WithColumnFormatting,
    FromQuery,
    WithDrawings,
    WithCustomStartCell,
    WithTitle
{
    private $bank;
    private $condition;

    public function __construct(string $bank, int $condition)
    {
        $this->bank = $bank;
        $this->condition = $condition;
    }

    public function query()
    {
        if($this->condition == 1){
            return Candidate::query();
        }
        if($this->condition == 2){
            return Candidate::query()->where('bank', $this->bank);
        }
    }

    public function map($candidate): array 
    {
        return [
            $candidate->id,
            $candidate->manager_name,
            $candidate->team_name,
            $candidate->dob,
            $candidate->gender,
            $candidate->fan_club,
            $candidate->linkby,
            $candidate->email,
            $candidate->phone,
            $candidate->bank,
            $candidate->account_no,
            $candidate->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Manager Name',
            'Team Name',
            'DOB',
            'Gender',
            'Fan Club',
            'Link By',
            'Email',
            'Phone',
            'Bank',
            'Account no',
            'Apply At',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A7:L7')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => '9c9595',
                        ],
                    ],
                ]);
            }
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('img/cbs_logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function startCell(): string 
    {
        return 'A7';    
    }

    public function title(): string
    {
        return $this->bank;
    }
}
