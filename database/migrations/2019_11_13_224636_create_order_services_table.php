<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\OrderService;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requester');
            $table->string('department');
            $table->dateTime('date')->nullable();
            $table->string('contact');
            $table->mediumText('reason');
            $table->mediumText('soluction')->nullable();
            $table->string('technician')->nullable();
            $table->dateTime('date_resolution')->useCurrent()->nullable();
            $table->enum('status_service', array_keys(OrderService::STATUS_SERVICE))->default(1);
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
        Schema::dropIfExists('order_services');
    }
}
