<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->boolean("resolved")->default(false)->after("id");
            $table->string("comment", 500)->default("Bez komentáře")->after("resolved");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('resolved');
            $table->dropColumn('comment');
        });
    }
}
