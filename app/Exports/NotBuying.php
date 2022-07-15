<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;
use App\Models\School;


class NotBuying implements FromCollection , WithHeadings
{
    protected $data;
    protected $county;

    function __construct($data) {
            $this->county = $data['county'];
            $this->status = $data['status'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
               $records = School::where('client_status', $this->status);

        if($this->county)
        {
            $records = $records->whereHas('county', function ($q) {
                $q->where('id',$this->county);
            });
        }
        $finalrecords = $records->get();


        $OverAllData = [];
        foreach($finalrecords as $record)
        {
            $data = new stdClass();
            $data->current_status = $record->client_status;
            $data->date_updated = $record->date_updated;
            $data->school_name = $record->school_name;
            $data->county_name = $record->county[0]->name;
            $data->principal_name = $record->principal_name;
            $data->buyer_name = $record->buyer_name;
            $data->number_student = $record->number_student;

            array_push($OverAllData,$data);
        }
        return collect($OverAllData);
    }

    public function headings(): array
    {
        return [
            'CLIENT STATUS',
            'DATE UPDATED',
            'OFFICIAL SCHOOL NAME',
            'COUNTY',
            'PRINCIPAL NAME	',
            'BUYER NAME',
            'TOTAL NUMBER OF STUDENTS',

        ];
    }
}
