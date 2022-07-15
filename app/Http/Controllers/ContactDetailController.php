<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ContactDetailController extends Controller
{
    public function index()
    {
        $contact = ContactDetail::orderBy("id", "desc")->get();
        return view("admin.contact.list", get_defined_vars());
    }

    public function list()
    {
        $contact = ContactDetail::orderBy("id", "desc")->get();
        return view("ajax.contact.list", get_defined_vars());
    }

    public function addform()
    {
        return view("ajax.contact.add");
    }


    public function addCustomer(Request $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $contact_detail = new ContactDetail();
        } else {
            $contact_detail =  ContactDetail::FindorFail($id);
        }
        $contact_detail->name = $request->name;
        $contact_detail->email = $request->email;
        $contact_detail->company_name = $request->company_name;
        $contact_detail->company_address = $request->company_address;
        $contact_detail->phone = $request->phone;
        $contact_detail->nameCompany = $request->nameCompany;

        $contact_detail->save();
        if ($request->ajax()) {
            return response()->json([
                'success' => 'Success',
            ]);
        }
    }

    public function edit($id)
    {
        $contact_detail =  ContactDetail::FindorFail($id);
        return view("ajax.contact.edit", get_defined_vars());
    }

    public function delete($id)
    {
        ContactDetail::destroy($id);
        return response()->json('Customer Detail Deleted');
    }

    public function status(Request $request)
    {
        $status = ($request->status == "true") ? true : false;
        $contact_detail =  ContactDetail::FindorFail($request->id);
        $contact_detail->status = $status;
        $contact_detail->save();
        if ($request->ajax()) {
            return response()->json('Status updated');
        }
    }
}
