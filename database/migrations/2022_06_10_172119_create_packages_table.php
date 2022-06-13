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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->float('package_price');
            $table->float('sponsor_bonus');
            $table->float('roi');
            $table->float('lvl_1');
            $table->float('lvl_2');
            $table->float('lvl_3');
            $table->float('lvl_4');
            $table->float('lvl_5');
            $table->float('lvl_6');
            $table->float('lvl_7');
            $table->float('lvl_8');
            $table->float('lvl_9');
            $table->float('lvl_10');
            $table->float('lvl_11');
            $table->float('lvl_12');
            $table->float('lvl_13');
            $table->float('lvl_14');
            $table->string('status')->default(1);

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
        Schema::dropIfExists('packages');
    }
};
