<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_trips', function (Blueprint $table) {
            $table->id();
            $table->string('trip_id',100)->nullable()->unique();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('employee_full_name',1000)->nullable();
            $table->string('employee_position')->nullable();
            $table->string('trip_adress')->nullable();
            $table->string('trip_days')->nullable();
            $table->string('trip_day')->nullable();
            $table->date('trip_begin_date')->nullable();
            $table->date('trip_end_date')->nullable();
            $table->string('employee_passport')->nullable();
            $table->date('order_date')->nullable();
            $table->string('order_number')->nullable();
            $table->string('employee_responsible_position')->nullable();
            $table->string('employee_responsible_name')->nullable();
            $table->string('shipping_adress', 1000)-> nullable();
            $table->date('shipping_date')-> nullable();
            $table->string('qr_code')->nullable();
            $table->string('arrival_adress', 1000)-> nullable();
            $table->date('arrival_date')-> nullable();
            $table->string('statistical',255)->nullable();
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
        Schema::dropIfExists('business_trips');
    }
}
