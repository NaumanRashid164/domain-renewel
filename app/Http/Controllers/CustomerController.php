<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index($type = null)
    {
        $customers = Customer::with("contact")->with("duration")
            ->with("name")
            ->orderBy("id", "desc")
            ->get();
        // dd($customers);
        return view("admin.customer.list", get_defined_vars());
    }
    public function list($type = null)
    {
        $customers = Customer::with("contact")->with("duration")
            ->with("name")
            ->orderBy("id", "desc")
            ->get();
        return view("ajax.customer.list", get_defined_vars());
    }

    public function addform()
    {
        return view('ajax.customer.add');
    }

    public function addCustomer(Request $request)
    {
        $request->validate([
            "domain_name" => "required",
            "contact_details_id" => "required",
            "start_date" => "required",
            "expiry_date" => "required",
            "cost" => "required",
            "vat_rate" => "required",
            "vat" => "required",
            "cost_inc_vat" => "required",
            "comment" => "required",
            "registration" => "required",
            "hosted" => "required",
            "email" => "required",
        ]);
        $id = $request->id;
        if ($id == 0) {
            $customer = new Customer;
        } else {
            $customer = Customer::findorFail($id);
        }
        $customer->domain_name = $request->domain_name;
        $customer->contact_id = $request->contact_details_id;
        $customer->start_date = $request->start_date;
        $customer->duration_id = $request->duration_id;
        $customer->expiry_date = $request->expiry_date;
        $customer->vat_id = $request->vat_rate;
        $customer->vat = $request->vat;
        $customer->cost_inc_vat = $request->cost_inc_vat;
        $customer->cost = $request->cost;
        $customer->comment = $request->comment;
        $customer->registrant_id = $request->registration;
        $customer->email_id  = $request->email;
        $customer->hosted = $request->hosted;
        $customer->hosting_id = $request->hosting;
        if ($request->service_checkbox == "1") {
            $customer->service_stopped = true;
        } else {
            $customer->service_stopped = false;
        }
        $customer->stopped_by = $request->stopped_by;
        $customer->stopped_comment = $request->stopped_comment;

        $customer->save();
        if ($request->ajax()) {
            return response()->json([
                'success' => 'Success',
            ]);
        }
    }

    public function edit($id)
    {
        $customer = Customer::findorFail($id);
        return view('ajax.customer.edit', get_defined_vars());
    }

    public function delete($id)
    {
        Customer::destroy($id);
        return response()->json('Customer Deleted');
    }

    public function status(Request $request)
    {
        $status = ($request->status == "true") ? true : false;
        $contact_detail =  Customer::FindorFail($request->id);
        $contact_detail->status = $status;
        $contact_detail->save();
        if ($request->ajax()) {
            return response()->json('Status updated');
        }
    }

    public function detail($id)
    {
        $customer = Customer::findorFail($id);
        return view('ajax.customer.detail', get_defined_vars());
    }
}
