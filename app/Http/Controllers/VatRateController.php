<?php

namespace App\Http\Controllers;

use App\Models\VatRate;
use Validator;
use Illuminate\Http\Request;

class VatRateController extends Controller
{
    public function index($type = null)
    {
        $vat = VatRate::orderBy('id', 'DESC')->get();

        return view('admin.vat.list', get_defined_vars());
    }

    public function list()
    {
        $vat = VatRate::orderBy('id', 'DESC')->get();
        return view('ajax.vat.list', get_defined_vars());
    }

    public function addfrom()
    {
        return view('ajax.vat.add');
    }

    public function addVat(Request $request)
    {
        $request->validate([
            "vat_rate" => 'required|unique:vat_rates,rate'
        ]);
        $id =  $request->id;
        if ($id == 0) {
            $vat = new VatRate();
        } else {
            $vat =  VatRate::find($id);
        }
        $vat->rate = $request->vat_rate;
        $vat->save();
        if ($request->ajax()) {
            return response()->json([
                'success' => 'Success',
            ]);
        }
    }

    public function edit($id)
    {
        $vat = VatRate::find($id);
        return view('ajax.vat.edit', get_defined_vars());
    }

    public function delete($id)
    {
        VatRate::destroy($id);
        return response()->json('Name Deleted');
    }
}
