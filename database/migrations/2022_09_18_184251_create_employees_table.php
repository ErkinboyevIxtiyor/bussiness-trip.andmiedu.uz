<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id',100)->nullable()->unique();
            $table->foreignId('position_id')->constrained()->onDelete('cascade');
            $table->string('second_name', 1000)-> nullable();
            $table->string('first_name', 1000)-> nullable();
            $table->string('third_name', 1000)-> nullable();
            $table->string('employee_passport', 1000)-> nullable();
            $table->string('employee_gender', 1000)-> nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('employees');
    }
}
