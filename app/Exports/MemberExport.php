<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use stdClass;

class MemberExport implements FromCollection , WithHeadings
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

        foreach($this->data as $key => $member)
        {
            $res = new stdClass();
            $res->id = $key + 1;
            $res->date_added = dateForamt($member->created_at);
            $res->start_date = $member->start_date;
            $res->renewal_date = renewal($member->created_at);
            $res->days_to_renewal = dayToRenewal($member->created_at);
            $res->first_name = $member->first_name;
            $res->sur_name = $member->sur_name;
            $res->gender = $member->gender;
            // $res->full_name = $member->full_name;
            $res->address_1 = $member->address_1;
            $res->address_2 = $member->address_2;
            $res->county_id = $member->county->name;
            $res->county_branch = $member->branch->name;
            $res->membership = $member->membership;
            $res->membership_number = $member->membership_number;
            // $res->eircode = $member->eircode;
            $res->email = $member->email;
            $res->phone_number = $member->phone_number;
            // $res->payment_method = $member->payment_method;
            $res->farming_enterprise = $member->farming_enterprise;
            $res->status = $member->status;
            array_push($OverAllData,$res);
        }
        return collect($OverAllData);

    }

    public function headings(): array
    {
        return [
            'Id',
            'Date Added',
            'Start Date',
            'Renewal Date',
            'Days to Renewal',
            'First Name',
            'Sur Name',
            // 'Full Name',
            'Gender',
            'Address 1',
            'Address 2',
            'County',
            'INHFA County Branch',
            // 'Eircode',
            'Membership',
            'Membership Number',
            'Email',
            'Phone Number',
            // 'Payment Method',
            'Farming Enterprise',
            'Status',
        ];
    }
}
