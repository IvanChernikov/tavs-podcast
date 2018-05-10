<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
		Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->string('yid')->unique();
			$table->string('name');
            $table->string('slug');
			$table->text('description')->nullable();
			$table->date('posted_at')->nullable();
        });
		
		Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
            
			$table->string('name');
            $table->text('description');
			$table->datetime('starts_at');
			$table->string('type');
        });
		
		Schema::create('episode_user', function (Blueprint $table) {
            $table->integer('episode_id')->unsigned();
			$table->foreign('episode_id')->references('id')
				->on('episodes')
				->onUpdate('cascade')
				->onDelete('cascade');
			
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');
				
			$table->string('role');
        });
		
		Schema::create('event_user', function (Blueprint $table) {
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')
				->on('events')
				->onUpdate('cascade')
				->onDelete('cascade');
			
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');
				
			$table->string('role');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('event_user');
		Schema::dropIfExists('episode_user');
		Schema::dropIfExists('events');
		Schema::dropIfExists('episodes');
    }
}
