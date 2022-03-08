<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email') ;
            $table->string('password', 50);
            $table->rememberToken();
            $table->string('verify_email', 100);
            $table->tinyInteger('is_active')->default(1)
                ->comment('0: Không hoạt động , 1: hoạt động');
            $table->tinyInteger('is_delete')->default(0)
                ->comment('0: Bình thường , 1: đã xóa');
            $table->string('group_role', 50);
            $table->timestamp('last_login_at');
            $table->string('last_login_ip', 40);
            $table->timestamps();
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
