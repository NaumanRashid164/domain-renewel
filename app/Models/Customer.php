<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function contact()
    {
        return $this->hasOne(ContactDetail::class, "id", "contact_id");
    }

    public function duration()
    {
        return $this->hasOne(Duration::class, "id", "duration_id");
    }
    public function name()
    {
        return $this->hasOne(Name::class, "id", "registrant_id");
    }
}
