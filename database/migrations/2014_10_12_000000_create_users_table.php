<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->rememberToken();
			
			$table->string('name');
            $table->string('email')->unique();
            $table->string('password');
			
            $table->text('description')->nullable();
			$table->string('image')->nullable();
			
			// Administration features 
			$table->boolean('is_admin')->default(false);
			// Used to add guests to casts, they won't show up in general cast list
			$table->boolean('is_guest')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
