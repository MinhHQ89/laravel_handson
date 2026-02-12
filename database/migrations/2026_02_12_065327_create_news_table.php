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
        Schema::create('news', function (Blueprint $table) {
            $table->id();                 // 'id'列をBIGINT型（自動増加）を作成し、主なキーに設定します
            $table->string('headline');   //  'headline'列を VARCHAR型（短文字列）を作成し、タイトル保存用に使用します
            $table->string('summary');    // 'summary'列をVARCHAR型を作成し、常に短い説明文を保存するためです。
            $table->timestamps();         // 'created_at' と 'updated_at' の２列を作成し、作成及び更新の時間を監視します。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
