<?php

namespace App\Imports;

use App\Models\SystemSim;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SystemSimImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $rows= $rows->forget(0);

        $sims=[];

        foreach ($rows as $row) {
            $sims[]=[
                'name' => $row[1],
                'ssn' => $row[0],
                'created_at'=>now(),
                'updated_at'=>now()
            ];
        }

        SystemSim::insert($sims);
    }
}
