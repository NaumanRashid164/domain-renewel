<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\County;
use App\Models\Duration;
use App\Models\Email;
use App\Models\Hosting;
use App\Models\MessageSetUp;
use App\Models\Registrant;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $Duration = Duration::orderBy('id', 'DESC')->get();
        return view('admin.setup', get_defined_vars());
    }
}
