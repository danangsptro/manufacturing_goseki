<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToYourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 20)->unique()->after('email');
            $table->string('user_role', 20)->after('username');
            $table->string('jenis_kelamin', 15)->after('user_role');
            $table->bigInteger('no_telepon')->after('jenis_kelamin');
            $table->string('tempat_lahir', 20)->after('no_telepon');
            $table->date('tanggal_lahir')->after('tempat_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
