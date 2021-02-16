<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_themes', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        //Предустановленная тема вопроса
        Artisan::call('db:seed', [
            '--class' => \Database\Seeders\FeedbackThemeSeeder::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_themes');
    }
}
