<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsToCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->string('name')->after('destination_id');
            $table->text('accommodation')->after('description');
            $table->string('insurance', 255);
            $table->string('transfer');
            $table->text('schedule');
            $table->string('surf_lessons', 255);
            $table->string('equipment');
            $table->string('skill_level');
            $table->string('instructors');
            $table->string('image_url_1', 500);
            $table->string('image_url_2', 500);
            $table->string('image_url_3', 500);
            $table->string('image_url_4', 500);
            $table->string('image_url_5', 500);
            $table->string('url', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->dropColumn(['name', 'accommodation', 'insurance', 'transfer', 
            'schedule', 'surf_lessons', 'equipment', 'skill_level', 'instructors', 
            'image_url_1', 'image_url_2', 'image_url_3', 'image_url_4', 'image_url_5',
            'url']);
        });
    }
}
