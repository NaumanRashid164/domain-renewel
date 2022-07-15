<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($type = null)
    {
        $data = Customer::with("contact")->with("duration")
            ->with("name")
            ->orderBy("id", "desc")
            ->get();

        if (count($data) > 0) {
            foreach ($data as $item) {
                // Condition if less then 28 days
                $time = explode('/', $item->expiry_date);;
                $newformat = date($time[2] . "-" . $time[1] . "-" . $time[0]);
                $expiryDate = date_create($newformat);
                $today = date('Y-m-d');
                $today = date_create($today);
                $diff = date_diff($today, $expiryDate);
                // ------------------------------
                if (($diff->days < 28) && ($diff->invert == 0)) {
                    $contact_name = $item->contact->name;
                    $company_name = $item->contact->company_name;
                    $domain_name = $item->domain_name;
                    $expiry_date = $item->expiry_date;
                    $email = $item->contact->email;
                    $due_amount = $item->cost;
                    $vat = $item->vat;
                    $total_incl_vat = $item->cost_inc_vat;

                    Mail::send("deactivatemail", get_defined_vars(), function ($message) use ($email) {
                        $message->to($email, 'Domain-renewel')
                            ->subject('Domain expiry soon');
                    });
                }
            }
            return response()->json('Email send');
        }
        // return view("deactivatemail",get_defined_vars());
    }
}
