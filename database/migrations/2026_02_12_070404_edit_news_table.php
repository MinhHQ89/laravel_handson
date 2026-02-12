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
        Schema::table('news', function (Blueprint $table) {
            $table->text('description');
            $table->renameColumn('headline', 'title');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            if (Schema::hasColumn('news', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('news', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('news', 'title')) {
                $table->renameColumn('title', 'headline');
            }
        });
    }
};
