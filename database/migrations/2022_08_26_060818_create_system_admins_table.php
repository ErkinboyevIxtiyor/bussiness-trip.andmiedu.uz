<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_admins', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id',100)->nullable()->unique();
            $table->string('second_name',255)->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('third_name',255)->nullable();
            $table->string('email',100)->nullable()->unique();
            $table->string('password',255)->nullable();
            $table->string('admin_avatar',255)->nullable();
            $table->boolean('status')->default(true);
            $table->string('remember_token',100)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_admins');
    }
}
