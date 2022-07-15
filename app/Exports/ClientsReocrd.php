<?php

namespace App\Exports;

use App\Models\ClientEngagement;
use App\Models\School;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class ClientsReocrd implements FromCollection , WithHeadings
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
        if(!empty($this->current_status) || !empty($this->county))
        {
         $records = ClientEngagement::orderBy('id', 'DESC');
        }
        else
        {
            $records = ClientEngagement::all();
        }

        if($this->current_status)
        {
            $records = $records->whereHas('school', function ($q) {
                $q->where('client_status',$this->current_status);
            });
        }

        if($this->county)
        {
            $records = $records->whereHas('school', function ($q) {
                $q->where('county_id',$this->county);
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
            $data->current_status = $record->school->client_status;
            $data->comment = $record->comment;
            $data->staff = $record->staff->name;
            $data->date_updated = $record->school->date_updated;
            $data->school_name = $record->school->school_name;
            $data->county_name = $record->school->county[0]->name;
            $data->principal_name = $record->school->principal_name;
            $data->buyer_name = $record->school->buyer_name;
            $data->number_student = $record->school->number_student;

            array_push($OverAllData,$data);
        }
        return collect($OverAllData);

    }

    public function headings(): array
    {
        return [
            'CLIENT STATUS',
            'Comment',
            'Staff name',
            'DATE UPDATED',
            'OFFICIAL SCHOOL NAME',
            'COUNTY',
            'PRINCIPAL NAME	',
            'BUYER NAME',
            'TOTAL NUMBER OF STUDENTS',

        ];
    }
}
