<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem_produksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_problem')->nullable();
            $table->bigInteger('mesin_produksi_id')->nullable()->unsigned();
            $table->bigInteger('operator_id')->nullable()->unsigned();
            $table->bigInteger('produk_id')->nullable()->unsigned();
            $table->bigInteger('proses_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->string('remark', 100)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();

            $table->foreign('mesin_produksi_id')->references('id')->on('mesin_produksis')->onDelete('cascade');
            $table->foreign('operator_id')->references('id')->on('operators')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
            $table->foreign('proses_id')->references('id')->on('proses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem_produksis');
    }
}
