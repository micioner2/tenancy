<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->json('item');
            $table->integer('quantity');
            $table->decimal('unit_value', 12, 2);

            $table->char('affectation_igv_type_id', 2);
            $table->decimal('total_base_igv', 12, 2);
            $table->decimal('percentage_igv', 12, 2);
            $table->decimal('total_igv', 12, 2);

            $table->char('system_isc_type_id', 2)->nullable();
            $table->decimal('total_base_isc', 12, 2)->default(0);
            $table->decimal('percentage_isc', 12, 2)->default(0);
            $table->decimal('total_isc', 12, 2)->default(0);

            $table->decimal('total_base_other_taxes', 12, 2)->default(0);
            $table->decimal('percentage_other_taxes', 12, 2)->default(0);
            $table->decimal('total_other_taxes', 12, 2)->default(0);
            $table->decimal('total_taxes', 12, 2);

            $table->char('price_type_id', 2);
            $table->decimal('unit_price', 12, 2);

            $table->decimal('total_value', 12, 2);
            $table->decimal('total', 12, 2);

            $table->json('attributes')->nullable();
            $table->json('charges')->nullable();
            $table->json('discounts')->nullable();

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('affectation_igv_type_id')->references('id')->on('affectation_igv_types');
            $table->foreign('system_isc_type_id')->references('id')->on('system_isc_types');
            $table->foreign('price_type_id')->references('id')->on('price_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
