<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name');
            $table->text('excerpt');
            $table->string('quote_author')->nullable();
            $table->string('quote_author_title')->nullable();
            $table->longText('introduction')->nullable();
            $table->longText('the_problem');
            $table->longText('the_solution');
            $table->longText('the_result');
            $table->longText('the_road_ahead')->nullable();
            $table->string('client_logo')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('industry')->nullable();
            $table->string('location')->nullable();
            $table->string('engagement_type')->nullable();
            $table->string('implementation_period')->nullable();
            $table->string('solution')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
