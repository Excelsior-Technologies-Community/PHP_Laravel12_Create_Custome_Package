<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('package_logs', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('ip_address')->nullable();
            $table->timestamp('visited_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_logs');
    }
};