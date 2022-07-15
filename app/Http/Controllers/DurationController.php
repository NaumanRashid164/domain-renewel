<?php

namespace App\Http\Controllers;

use App\Models\Duration;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class DurationController extends Controller
{
    public function index($type = null)
    {
        $Duration = Duration::orderBy('id', 'DESC')->get();
        return view('admin.duration.list', get_defined_vars());

        // if ($type == "registrant") {
        //     $getRegistant = Duration::orderBy('id', 'DESC')->where("type", "registrant")->get();
        //     return view('admin.registrant_duration.list', get_defined_vars());
        // } elseif ($type == "hosting") {
        //     $getHosting = Duration::orderBy('id', 'DESC')->where("type", "hosting")->get();
        //     return view('admin.hosting_duration.list', get_defined_vars());
        // } else {
        //     $getEmail = Duration::orderBy('id', 'DESC')->where("type", "email")->get();
        //     return view('admin.email_duration.list', get_defined_vars());
        // }
    }

    public function addfrom()
    {
        return view("ajax.duration.add");
    }

    public function addDuration(Request $request)
    {
        $request->validate([
            "duration" => 'required|max:255|unique:durations,duration'
        ]);
        $id =  $request->id;
        if ($id == 0) {
            $Duration = new Duration();
        } else {
            $Duration =  Duration::find($id);
        }
        $Duration->duration = $request->duration;
        $Duration->save();
        if ($request->ajax()) {
            return response()->json([
                'success' => 'Success',
            ]);
        }
    }

    public function list($type = null)
    {

        $Duration = Duration::orderBy('id', 'DESC')->get();
        return view('ajax.duration.list', get_defined_vars());

        // if ($type == "registrant") {
        //     $getRegistant = Duration::orderBy('id', 'DESC')->where("type", "registrant")->get();
        //     return view('ajax.registrant_duration.list', get_defined_vars());
        // } elseif ($type == "hosting") {
        //     $getHosting = Duration::orderBy('id', 'DESC')->where("type", "hosting")->get();
        //     return view('ajax.hosting_duration.list', get_defined_vars());
        // } else {
        //     $getEmail = Duration::orderBy('id', 'DESC')->where("type", "email")->get();
        //     return view('ajax.email_duration.list', get_defined_vars());
        // }
    }

    public function edit($id)
    {
        $Duration = Duration::find($id);

        return view('ajax.duration.edit', get_defined_vars());
    }

    public function delete($id)
    {
        Duration::destroy($id);
        return response()->json('Duration Deleted');
    }
}
