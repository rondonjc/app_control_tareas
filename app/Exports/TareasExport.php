<?php

namespace App\Exports;

use App\Models\Tarea;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TareasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tarea::all();
        return auth()->user()->tareas()->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'ID USUARIO',
            'TAREA',
            'FECHA LIMITED',
            'FECHA CREACION',
            'FECHA ACTUALIZACION'];
    }
}
