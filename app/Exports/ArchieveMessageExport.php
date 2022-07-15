<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use stdClass;

class ArchieveMessageExport implements FromCollection , WithHeadings
{
    protected $data;
    function __construct($data) {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $OverAllData = [];

        foreach($this->data as $key => $archieve)
        {
            // dd($archieve->branch->branch_name);
            $res = new stdClass();
            $res->date_sent = dateForamt($archieve->created_at);
            $res->full_name = $archieve->full_name;
            $res->branch_name = $archieve->branch->branch_name ?? '';
            $res->phone_number = $archieve->phone_number;
            $res->text_summary = $archieve->title ?? '';
            $res->message = $archieve->message;
            array_push($OverAllData,$res);
        }
        return collect($OverAllData);
    }

    public function headings(): array
    {
        return [
            'Date Send',
            'Full Name',
            'Branch',
            'Phone Number',
            'Text Summary',
            'Text description',
        ];
    }
}
