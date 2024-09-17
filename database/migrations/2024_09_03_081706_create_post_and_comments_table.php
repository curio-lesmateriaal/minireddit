<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Create the reddit_posts table
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the post
            $table->integer('upvotes')->default(0); // Number of upvotes
            $table->timestamps(); // Created at & Updated at timestamps
        });

        // Create the reddit_comments table
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Foreign key to reddit_posts
            $table->string('user'); // Username of the commenter
            $table->text('comment'); // Comment text
            $table->integer('upvotes')->default(0); // Number of upvotes
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
};
