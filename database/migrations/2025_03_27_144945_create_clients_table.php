<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique(); // Used as login ID
            $table->string('phone');
            $table->text('address')->nullable();
            $table->string('company_name')->nullable();

            $table->string('password'); // 👈 Required for authentication
            $table->unsignedBigInteger('employee_id'); // 👈 Linked to employee

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
