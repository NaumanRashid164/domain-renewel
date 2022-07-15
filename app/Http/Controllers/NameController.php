<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function index($type = null)
    {
        if ($type == "registrant") {
            $getRegistant = Name::orderBy('id', 'DESC')->where("type", "registrant")->get();
            return view('admin.registrant_name.list', get_defined_vars());
        } elseif ($type == "hosting") {
            $getHosting = Name::orderBy('id', 'DESC')->where("type", "hosting")->get();
            return view('admin.hosting_name.list', get_defined_vars());
        } else {
            $getEmail = Name::orderBy('id', 'DESC')->where("type", "email")->get();
            return view('admin.email_name.list', get_defined_vars());
        }
    }

    public function list($type = null)
    {
        if ($type == "registrant") {
            $getRegistant = Name::orderBy('id', 'DESC')->where("type", "registrant")->get();
            return view('ajax.registrant_name.list', get_defined_vars());
        } elseif ($type == "hosting") {
            $getHosting = Name::orderBy('id', 'DESC')->where("type", "hosting")->get();
            return view('ajax.hosting_name.list', get_defined_vars());
        } else {
            $getEmail = Name::orderBy('id', 'DESC')->where("type", "email")->get();
            return view('ajax.email_name.list', get_defined_vars());
        }
    }

    public function addfrom($type = null)
    {
        if ($type == "registrant") {
            return view('ajax.registrant_name.add');
        } elseif ($type == "hosting") {
            return view('ajax.hosting_name.add');
        } else {
            return view('ajax.email_name.add');
        }
    }

    public function addName(Request $request)
    {
        $request->validate([
            "name" => 'required', 'max:255', 'unique:Name,name,'
        ]);
        $type = $request->type;
        $id =  $request->id;
        if ($id == 0) {
            $Name = new Name();
        } else {
            $Name =  Name::find($id);
        }
        $Name->name = $request->name;
        $Name->type = $type;
        $Name->save();
        if ($request->ajax()) {
            return response()->json([
                'success' => 'Success',
            ]);
        }
    }

    public function edit($id)
    {
        $Name = Name::find($id);
        $type = $Name->type;

        if ($type == "registrant") {
            return view('ajax.registrant_Name.edit', get_defined_vars());
        } elseif ($type == "hosting") {
            return view('ajax.hosting_name.edit', get_defined_vars());
        } else {
            return view('ajax.email_name.edit', get_defined_vars());
        }
    }

    public function delete($id)
    {
        Name::destroy($id);
        return response()->json('Name Deleted');
    }
}
