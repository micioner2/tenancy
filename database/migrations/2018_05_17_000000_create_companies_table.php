<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->char('identity_document_type_id', 1);
            $table->string('number')->unique();
            $table->string('name');
            $table->string('trade_name')->nullable();
            $table->char('soap_type_id', 2);
            $table->string('soap_username')->nullable();
            $table->string('soap_password')->nullable();
            $table->string('certificate')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('identity_document_type_id')->references('id')->on('identity_document_types');
            $table->foreign('soap_type_id')->references('id')->on('soap_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
