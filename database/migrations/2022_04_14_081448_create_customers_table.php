<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("contact_id")->constrained("contact_details");
            $table->foreignId("duration_id")->constrained("durations");
            $table->unsignedBigInteger('vat_id');
            $table->foreign('vat_id')->references('id')->on('vat_rates');
            $table->foreignId("registrant_id")->constrained("names");
            $table->string("hosted");
            $table->foreignId("hosting_id")->constrained("names");
            $table->foreignId("email_id")->constrained("names");
            $table->string("vat");
            $table->string("cost_inc_vat");
            $table->string("start_date");
            $table->string("expiry_date");
            $table->string("cost");
            $table->boolean("service_stopped")->default(false);
            $table->string("stopped_by")->nullable();
            $table->string("stopped_comment")->nullable();
            $table->string("domain_name")->nullable();
            $table->string("comment");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
