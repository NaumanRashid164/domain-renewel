<?php

namespace App\Exports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use stdClass;

class OverAll implements FromCollection , WithHeadings
{
    protected $data;
    protected $id;
    protected $county;
    protected $current_status;

    function __construct($data) {
            $this->county = $data['county'];
            $this->current_status = $data['current_status'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // dd($this->current_status);
        if(!empty($this->current_status) || !empty($this->county))
        {
         $records = School::orderBy('id', 'DESC');
        }
        else
        {
            $records = School::all();
        }

        if($this->current_status)
        {
            $records = $records->where('client_status',$this->current_status);
        }

        if($this->county)
        {
            $records = $records->whereHas('county', function ($q) {
                $q->where('id',$this->county);
            });
        }

        if(!empty($this->current_status) || !empty($this->county))
        {
        $finalrecords = $records->get();
        }
        else
        {
        $finalrecords = $records;
        }

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
