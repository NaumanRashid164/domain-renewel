<?php

namespace App\Exports;

use App\Models\School;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FollowUp implements FromCollection , WithHeadings
{
    protected $data;
    protected $county;

    function __construct($data) {
            $this->county = $data['county'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        $getSchool = School::where('client_id','!=',null);

        if($this->county)
        {
            $getSchool = $getSchool->where('county_id',$this->county);
        }

        $getSchools = $getSchool->get();

        $getclientfollowup = [];

        foreach($getSchools as $school)
        {
            array_push($getclientfollowup,$school->followUpLast);
        }

        return collect($getclientfollowup);
    }

    public function headings(): array
    {
        return [
            'CLIENT STATUS',
            'Follow up comment',
            'Follow up date',
            'Official School Name',
            'County',
            'Principal Name',
            'TOTAL NUMBER OF STUDENTS',

        ];
    }
}
