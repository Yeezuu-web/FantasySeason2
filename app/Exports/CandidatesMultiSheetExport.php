<?php

namespace App\Exports;

use App\Models\Candidate;
use App\Exports\CandidatesExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CandidatesMultiSheetExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];

        for ($bank = 1; $bank <= 4; $bank++) {
            if($bank == 1){
                $sheets[] = new CandidatesExport('All', 1);
            }
            if($bank == 2){
                $sheets[] = new CandidatesExport('ABA', 2);
            }
            if($bank == 3){
                $sheets[] = new CandidatesExport('Wing', 2);
            }
            if($bank == 4){
                $sheets[] = new CandidatesExport('J-Trust Royal Bank', 2);
            }
            
        }

        return $sheets;
    }
}
