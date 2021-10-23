<?php

use App\Base;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalfStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('half_staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stuff_type');
            $table->integer('price');
            $table->double('count');
            $table->integer('department_id');
            $table->softDeletes(Base::DELETED_AT);
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
        Schema::dropIfExists('half_staff');
    }
}
