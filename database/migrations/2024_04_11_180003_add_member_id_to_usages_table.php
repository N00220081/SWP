<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMemberIdToUsagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('usages', function (Blueprint $table) {
        if (!Schema::hasColumn('usages', 'member_id')) {
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('usages', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropColumn('member_id');
        });
    }
}

