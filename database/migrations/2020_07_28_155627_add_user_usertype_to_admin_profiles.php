<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserUsertypeToAdminProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_profiles', function (Blueprint $table) {
            $table->string('user_usertype')->after('user_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_profiles', function (Blueprint $table) {
            $table->dropColumn('user_usertype')->after('user_email');
        });
    }
}
