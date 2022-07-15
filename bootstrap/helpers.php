<?php

use App\Models\ContactDetail;
use App\Models\County;
use App\Models\Duration;
use App\Models\Member;
use App\Models\Name;
use App\Models\VatRate;
use Carbon\Carbon;
use Illuminate\Support\Arr;

function carbonNow()
{
    $date = Carbon::now()->format('d-m-y');
    return str_replace("-", "/", $date);
}
function Contact_detail()
{
    $contact_detail = ContactDetail::where("status", true)->orderBy("id", "desc")->get();
    return $contact_detail;
}

function duration()
{
    $duration = Duration::get();
    return $duration;
}

function email_name()
{
    $email_name = Name::where("type", "email")->get();
    return $email_name;
}

function hosting_name()
{
    $hosting_name = Name::where("type", "hosting")->get();
    return $hosting_name;
}

function registrant_name()
{
    $registrant_name = Name::where("type", "registrant")->get();
    return $registrant_name;
}

function vat_rate()
{
    $vats = VatRate::orderBy("id", "desc")->get();
    return $vats;
}
