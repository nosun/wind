<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToWikiCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wiki_categories', function (Blueprint $table) {
            $table->text('definition');
            $table->text('theory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wiki_categories', function (Blueprint $table) {
            $table->dropColumn('definition');
            $table->dropColumn('theory');
        });
    }
}
