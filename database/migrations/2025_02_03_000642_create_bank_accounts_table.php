<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->foreignId('bank_logo_id');
            $table->foreignId('user_id');
            $table->foreign('bank_logo_id')
                ->references('id')
                ->on('bank_logos');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->decimal('initial_balance', 15, 2);
            $table->date('initial_balance_date');
            $table->decimal('current_balance', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_accounts', function (Blueprint $table) {
            $table->dropForeign(['bank_logo_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('bank_accounts');
    }
};
