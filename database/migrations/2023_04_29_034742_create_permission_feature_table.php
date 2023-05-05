<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::disableForeignKeyConstraints();
            Schema::create('permission_feature', function (Blueprint $table) {
                $table->unsignedInteger('permission_id')->nullable();
                $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
                $table->unsignedInteger('feature_id')->nullable();
                $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            });
            Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_feature');
    }
};
