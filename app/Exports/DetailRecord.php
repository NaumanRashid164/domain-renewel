<?php

namespace App\Exports;

use App\Models\ClientEngagement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use stdClass;

class DetailRecord implements FromCollection , WithHeadings
{
    protected $data;
    protected $id;
    protected $county;
    protected $current_status;

    function __construct($data) {
            $this->id = $data['school_id'];
            // $this->county = $data['county'];
            // $this->current_status = $data['current_status'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $records = ClientEngagement::where('school_id',$this->id);

        // if($this->current_status)
        // {
        //     $records = $records->whereHas('school', function ($q) {
        //         $q->where('client_status',$this->current_status);
        //     });
        // }

        // if($this->county)
        // {
        //     $records = $records->whereHas('school', function ($q) {
        //         $q->where('county_id',$this->county);
        //     });
        // }
        $finalrecords = $records->get();
        $clients = [];
        foreach($finalrecords as $record)
        {
            $data = new stdClass();
            $data->current_status = $record->school->client_status;
            $data->comment = $record->school->comment;
            $data->staff_name = $record->staff->name;
            $data->date_updated = $record->school->date_updated;
            $data->school_name = $record->school->school_name;
            $data->county_name = $record->school->county[0]->name;
            $data->principal_name = $record->school->principal_name;
            $data->buyer_name = $record->school->buyer_name;
            $data->number_student = $record->school->number_student;

            array_push($clients,$data);
        }
        return collect($clients);
    }

    public function headings(): array
    {
        return [
            'Status at time of comment',
            'Comment',
            'Staff name',
            'Date updated',
            'Official School Name',
            'County',
            'Principal Name',
            'Buyer Name',
            'Number of students',
        ];
    }
}
