<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->char('title', 35)->unique();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {

            $table->foreignId('product_type_id')
                ->constrained('product_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_types');

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('product_type_id_foreign');
            $table->dropcolumn('product_type_id');
        });
    }
}
