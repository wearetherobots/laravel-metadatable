<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMetadataTable.
 */
class CreateMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('metadatable.table_name'), function (Blueprint $table) {
            $table->increments('id');

            $table->integer('metadatable_id')
                ->unsigned()
                ->index();

            $table->string('metadatable_type')
                ->index();

            $table->json('value');

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
        Schema::drop(config('metadatable.table_name'));
    }
}
