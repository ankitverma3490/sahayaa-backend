<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First, update any existing string role_ids to proper integer IDs
        // This handles cases where role_id was stored as string
        DB::statement('UPDATE subscriptions SET role_id = NULL WHERE role_id = "" OR role_id = "null"');
        
        // Change role_id column from string to unsignedBigInteger
        Schema::table('subscriptions', function (Blueprint $table) {
            // Drop the old column and recreate it with correct type
            $table->dropColumn('role_id');
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable()->after('razorpay_order_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('role_id')->nullable()->after('razorpay_order_id');
        });
    }
};
