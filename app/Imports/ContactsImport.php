<?php

namespace App\Imports;

use App\Models\Contect;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contect([
            'name'=>$row['username'],
            'email'=>$row['email'],
        ]);
    }

    public function ha()
    {
        
    }
}
