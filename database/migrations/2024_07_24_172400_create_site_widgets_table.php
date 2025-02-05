<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 *
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_widgets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            ## 활성화
            $table->string('enable')->nullable();

            $table->string('type')->nullable();

            // 위젯 이름
            $table->string('name')->nullable();
            $table->string('description')->nullable();

            // 파일명
            $table->string('filename')->nullable();
            $table->string('image')->nullable();

            // 뷰 기본값
            $table->string('view_layout')->nullable();
            $table->string('view_list')->nullable();
            $table->string('view_form')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_widgets');
    }
};
