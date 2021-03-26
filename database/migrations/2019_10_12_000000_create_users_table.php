<?php

use App\Models\User;
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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('code', 10)->nullable();
            $table->string('avatar', 50)->default('user.png');
            $table->integer('role_id')->default(0);
            $table->integer('user_type')->default(2)->comment = '1->admin  -  2->user';
            $table->boolean('active')->default(1);
            $table->boolean('block')->default(0);
            $table->string('lang', 2)->default('ar');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        User::create([
            'name'      => 'fekry',
            'email'     => 'm1@a.s',
            'phone'     => '01069541294',
            'password'  => 123456,
            'user_type' => 1,
            'role_id'   => 1,
        ]);
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
