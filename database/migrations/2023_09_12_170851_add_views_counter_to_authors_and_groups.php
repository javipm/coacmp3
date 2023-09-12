<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->bigInteger('pageviews')->default(0)->after('slug');
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->bigInteger('pageviews')->default(0)->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn('pageviews');
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->dropColumn('pageviews');
        });
    }
};
